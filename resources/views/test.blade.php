@extends('layout')

@section('content')
<h1>Dupa</h1>
<p>This is my first laravel page</p>
{{-- using {{$variable}} we sanitize the string so user wont inject code and everything will become a string
To avoid sanitazation we can use {!!$Variable!!} --}}
<p>{{$name}}</p>
@endsection
