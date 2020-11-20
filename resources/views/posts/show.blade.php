@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-outline-dark mb-3">Go back</a>
<h1>{{$post->title}}</h1>
<p>Description: {{$post->description}}</p>
<p><small>Written on: {{$post->publication_date}}</small></p>
<p><small>Written by: {{Auth::user()->name}}</small></p>
@endsection
