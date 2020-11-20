@extends('layouts.app')

@section('content')
<div class="card-body row">
	<div class="col">
		<h1>All posts</h1>
	</div>

	<div class="mb-2 col">
		<form class="form-inline" action="/posts" method="get">
			<p>Sory by publication date: </p>
			<button class="btn btn-outline-primary ml-3 mr-3" type="submit" name="submit" value="asc">
				asc
			</button>
			<button class="btn btn-outline-primary" type="submit" name="submit" value="desc">
				desc
			</button>
		</form>
	</div>
</div>

@if(count($posts) > 0)
	<div class="card">
		<ul class="list-group list-group flush">
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
	<hr>
	<p>You have no posts.</p>
@endif
@endsection
