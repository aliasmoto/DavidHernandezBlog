<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client; // To invalid ssl
use App\Post;
use DateTime;

class PostsController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}

    /**
     * Display a listing of the resource.
     *
	 * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$posts = Post::orderBy('publication_date', 'desc')->get();
		if($request->submit == "asc"){
			$posts = Post::orderBy('publication_date', 'asc')->get();
		}

		return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'title' => 'required',
			'description' => 'required',
		]);

		$post = new Post;
		$post->title = $request->input('title');
		$post->description = $request->input('description');
		$post->publication_date =  new DateTime('NOW');
		$post->user_id = auth()->user()->id;
		$post->save();

		return redirect('/posts')->with('success', 'Post created');
    }

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromApi(Request $request)
    {
		// Obtain data fron Api rest
		$client = new Client(["verify" => false]);
		$client = $client->get('https://sq1-api-test.herokuapp.com/posts')->getBody()->getContents();
		$client = json_decode($client, true); // Transform string to json

		if (!empty($client) && !empty($client['data'])){
			//go through the array and create the posts
			foreach ($client['data'] as $postData) {
				$post = new Post;
				$post->title = $postData['title'];
				$post->description = $postData['description'];
				$post->publication_date =  $postData['publication_date'];
				$post->user_id = auth()->user()->id;
				$post->save();
			}
		}

		return redirect('/posts')->with('success', 'Posts created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
		return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
