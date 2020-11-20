@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>All posts</h1>
			</div>
			<div class="col">
				<button class="btn btn-outline-primary">
					Order by publication date
				</button>
			</div>
		</div>
	</div>

	@if(count($posts) > 0)
	<div class="card">
		<ul class = "list-group list-group flush">
		@foreach($posts as $post)
			<li class="list-group-item">
				<h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
				<ul>
					<li>Description: {{$post->description}}</li>
					<li>Written on: {{$post->publication_date}}</li>
				</ul>
			</li>
		@endforeach
		</ul>
	</div>
	@else
		<p>You have no posts.</p>
	@endif
@endsection
