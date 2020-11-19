@extends('layouts.app')

@section('content')
	<h1>Posts</h1>
		@if(count($posts) > 1)
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

		@endif
@endsection
