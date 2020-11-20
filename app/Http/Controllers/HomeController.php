<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
	 * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
		//Get the auth user to display his posts
		$user_id = auth()->user()->id;
		$user = User::find($user_id);

		//Depending on the value obtained by pressing the button,
		//we order according to this
		$posts = $user->posts->sortByDesc('publication_date');
		if($request->submit == "asc"){
			$posts = $user->posts->sortBy('publication_date');
		}

		return view('home')->with('posts', $posts);
    }
}
