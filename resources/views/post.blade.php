@extends('layout')

@section('content')
<h1>{{$post->title}}</h1>
<p>{{$post->body}}</p>
<a href="/posts/{{$post->slug}}/edit">EDIT POST</a>
@endsection