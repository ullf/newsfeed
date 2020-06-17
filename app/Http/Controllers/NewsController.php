<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Link as Links;
use App\News;
use App\ReadComment;
use App\Comment;
use App\User;
use App\Publish;
use Illuminate\Support\Facades\DB;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return redirect()->route("news",["id"=>1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$user = Auth::User();
		$article = new News();
		$article->title = $request->title;
		$article->news_text = $request->news_text;
		$article->news_category=$request->category;
		$l = $request->get('ll');
		$article->l_url=$l;
		$article->save();
		$publish = new Publish();
		$publish->publisherid = $user->id;
		$publish->newsid = $article->id;
		echo $publish->newsid;
		$article->publish()->save($publish);
		return redirect()->route("news",["id"=>$publish->newsid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$user = Auth::user();
		$speclink = News::find($id);
		$author = DB::table("publish")->join('user', 'user.id', '=', 'publish.publisherid')->
		where('newsid','=',$speclink->id)->get('username');
		$comments = DB::table("readcomment")->join('comment', 'comment.id', '=', 'readcomment.commentid')->
			where('comment.newsid','=',$id)->get();
		if(!$author->count() == 0) {
			return view("news",array('news'=>$speclink,'comments' => $comments,'author'=>$author[0]->username,'user'=>$user));
		} else {
			return view("news",array('news'=>$speclink,'comments' => $comments,'user'=>$user));
		}
    }
	
	public function news_edit($id) 
	{
		$user = Auth::user();
		$speclink = Links::find($id);
		$news = $speclink->links()->get();
		return view("news_edit",array('news'=>$news[0],'user'=>$user));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$user = Auth::User();
		$news = News::find($id);
		$affected = DB::table('news')
              ->where("id", $news->id)
              ->update(['news_text' => $request->news_text]);
		return redirect()->action('LinkController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = Auth::User();
	   $news = News::find($id);
	   DB::table("publish")->where("newsid",$news->id)->delete();
	   DB::table("news")->where("id",$news->id)->delete();
	   return redirect()->action('LinkController@index');
    }
}
