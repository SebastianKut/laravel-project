@extends('layout')

@section('content')


<h1>{{$post->title}}</h1>
<p>{{$post->body}}</p>

{{-- Eventhough we dnt have field called tags we have direct acces to it like below because we created method tags in out Post Model, makes it super simple to display --}}
@foreach ($post->tags as $tag )
<a href="/archive?tag={{$tag->name}}">{{$tag->name}}</a>
@endforeach
<a href="/posts/{{$post->slug}}/edit">EDIT POST</a>
@endsection