@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
						<table class="table table-striped">
							<tr>
								<th>Title</th>
							</tr>
							@foreach($posts as $post)
								<tr>
									<th>{{$post->title}}</th>
								</tr>
							@endforeach
						</table>
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
