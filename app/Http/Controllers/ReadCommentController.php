<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\News;
use App\Comment;
use App\ReadComment;
use Link as Links;
class ReadCommentController extends Controller
{
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
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
		if($user->isPublisher() == 0) {
		$comment = new Comment();
		$comment->comment_text = $request->comment_text;
		$comment->newsid = $request->get('id');
		$comment->author = $user->username;
		if(stripos($comment->comment_text,"good") !== false) {
			$comment->quality = 1;
		} else {
			$comment->quality = 0;
		}
		$comment->save();
		$readcomment = new ReadComment();
		$readcomment->userid = $user->id;
		$readcomment->commentid = $comment->id;
		$comment->readcomment()->save($readcomment);
		return redirect()->route('news',['id'=>$comment->newsid]);
		} else {
			echo "Only readers can leave comments";
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	public function comment_edit($id) 
	{
		$user = Auth::User();
		$comment = Comment::find($id);
		if($user->username == $comment->author) {
			return view("comment_edit",['comment'=>$comment,'user'=>$user]);
		}
	}

		
    public function show($id)
    {
		$user = Auth::User();
		$comment = Comment::find($id);
		if($user->username == $comment->author) {
			return view("comment_edit",['comment'=>$comment,'user'=>$user]);
		}
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
		$comment = Comment::find($id);
		$affected = DB::table('comment')
              ->where("id", $comment->id)
              ->update(['comment_text' => $request->comment_text]);
		return redirect()->route('news',['id'=>$comment->newsid]);
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
	   $comment = ReadComment::find($id);
	   $newsid = Comment::find($comment->id)->newsid;
       DB::table("readcomment")->where("id",$comment->commentid)->delete();
	   DB::table("comment")->where("id",$comment->commentid)->delete();
	  return redirect()->route('news',['id'=>$newsid]);
    }
}
