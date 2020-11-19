<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
		$title = "Index page";
		return view('pages.index', compact('title'));
	}

	public function about() {
		$title = "About me page";
		return view('pages.about')->with('title',$title);
	}
}
