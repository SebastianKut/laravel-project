@extends('layout')

@section('content')
<div class="inner">
    <form action="/posts/{{$post->slug}}" method="POST">

        {{-- @csrf -This prevents malicious code to be injected to the database form another location other than my website --}}
        @csrf

        {{-- Browsers only understand GET and POST so you have to add POST method in the form and add below to tell server its PUT really --}}
        @method('PUT')

        <div class="field half first">
            <label for="slug">Slug</label>
            <input name="slug" id="slug" type="text" placeholder="Slug"
                value='{{!old('slug') ? $post->slug : old('slug')}}'>
            @error('slug')
            <p>{{$errors->first('slug')}}</p>
            @enderror
        </div>
        <div class="field half">
            <label for="title">Title</label>
            <input name="title" id="title" type="text" placeholder="Title"
                value='{{!old('title') ? $post->title : old('title')}}'>
            @error('title')
            <p>{{$errors->first('title')}}</p>
            @enderror
        </div>
        <div class="field">
            <label for="body">Post body</label>
            <textarea name="body" id="body" rows="6"
                placeholder="Body">{{!old('body') ? $post->body : old('body')}}</textarea>
            @error('body')
            <p>{{$errors->first('body')}}</p>
            @enderror
        </div>
        <ul class="actions">
            <li><input value="Update" class="button alt" type="submit"></li>
        </ul>
    </form>
</div>
@endsection