@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

					<a href="/posts/create" class="btn btn-primary">Create new post</a>

					<div class="container mt-5">
						<h3>Your Personal Posts</h3>
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
					</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
