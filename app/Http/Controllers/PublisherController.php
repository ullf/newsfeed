<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Route;
use App\Publisher;
use App\Publish;
use App\News;
use App\User;
use App\Link as Links;
use Illuminate\Support\Facades\Auth;
class PublisherController extends Controller
{
	use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
    public function index()
    {
		$user = Auth::User();
		$links = Links::all();
		$numofpubs = Publish::all()->where('publisherid','=',$user->id)->count();
		if($user->isPublisher() == 1) {
			return view('pub',['userinfo'=>$user,'links'=>$links,'num'=>$numofpubs]);
		} else {
			return view('pub',['userinfo'=>$user,'reader'=>false]);
		}
		return view('pub',['reader'=>false]);
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
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$user = User::all()->where('username','=',$id)->where('isadmin','=','1');
		if($user->count() == 0){
			echo "Publisher not found";
		} else {
			$numofpubs = Publish::all()->where('publisherid','=',$user[1]->id)->count();
			$links = Links::all();
			return redirect()->route('publisher',['name'=>$user[1]->username,'userinfo'=>$user,'links'=>$links,'num'=>$numofpubs]);
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
