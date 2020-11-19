@extends('layouts.app')

@section('content')
	<h1>Create Post</h1>
	{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
	    <div class="form-group">
	    	{{Form::label('title', 'Title')}}
	    	{{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
	    </div>
		<div class="form-group">
	    	{{Form::label('description', 'Description')}}
	    	{{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
	    </div>
		<hr>
		{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
	{!! Form::close() !!}
@endsection
