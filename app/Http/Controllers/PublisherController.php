<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;
use App\Publisher;
use App\Publish;
use App\News;
use App\User;
use App\Link as Links;
use App;
use Session;
use App\Comment;
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
	 
	public function change_locale(Request $request) {
		$locale = $request->locale;
		App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
	}
	 
    public function index()
    {
		$user = Auth::User();
		$links = Links::all();
		$numofpubs = Publish::all()->where('publisherid','=',$user->id)->count();
		$num = Publish::all()->where('publisherid','=',$user->id);
		if($user->isPublisher() == 1) {
			$sum = DB::table('comment')->join(
			'publish','publish.newsid','comment.newsid'
			)->join('user','user.id','publish.publisherid')->where('user.id','=',$user->id)->sum("quality");
			return view('pub',['userinfo'=>$user,'links'=>$links,'ranking'=>$sum,'num'=>$numofpubs,'reader'=>false]);
		} else {
			return view('pub',['userinfo'=>$user,'reader'=>true]);
		}
		//return view('pub',['reader'=>true]);
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
		$user = User::all()->where('username','=',$id)->where('is_publisher','=','1');
		if($user->count() == 0){
			echo "Publisher not found";
		} else {
			$numofpubs = Publish::all()->where('publisherid','=',$user[0]->id)->count();
			return view('profile',['userinfo'=>$user[0],'num'=>$numofpubs]);
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
