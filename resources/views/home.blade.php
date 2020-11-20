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

					{{-- As it is in the home page, it will only be visible to the user --}}
					<a href="/posts/create" class="btn btn-primary">Create new post</a>

					{{-- Sort by publication date --}}
					<div class="container mt-5">
						<div class="row">
							<h3>Your Personal Posts</h3>
							@if(count($posts) > 0)
								<div class="mb-2 col">
									<form class="form-inline" action="/home" method="get">
										<p>Sory by publication date: </p>
										<button class="btn btn-outline-primary ml-3 mr-3" type="submit" name = "submit" value = "asc">
											asc
										</button>
										<button class="btn btn-outline-primary" type="submit" name = "submit" value = "desc">
											desc
										</button>
									</form>
								</div>
						</div>
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
