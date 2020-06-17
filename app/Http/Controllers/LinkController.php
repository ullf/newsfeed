<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\News;
use App\Comment;
use App\ReadComment;
class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
		$links = Link::all();
		return view("links",array('links' => $links));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $link = new Link();
		$link->l_url = $request->l_url;
		$link->ranking = 0;
		$link->save();
		redirect()->route("links");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $speclink = Link::find($id);
		$n = News::all()->where('l_url',$speclink->l_url);
		return view("link_show",array('speclink' => $speclink,'n'=>$n));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
