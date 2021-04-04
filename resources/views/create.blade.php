@extends('layout')

@section('content')
<div class="inner">
    <form action="/posts" method="post">

        {{-- @csrf -This prevents malicious code to be injected to the database form another location other than my website --}}
        @csrf
        <div class="field half first">
            <label for="slug">Slug</label>
            <input name="slug" id="slug" type="text" placeholder="Slug" value="{{old('slug')}}">
            @error('slug')
            <p>{{$errors->first('slug')}}</p>
            @enderror
        </div>
        <div class="field half">
            <label for="title">Title</label>
            <input name="title" id="title" type="text" placeholder="Title" value="{{old('title')}}">
            @error('title')
            <p>{{$errors->first('title')}}</p>
            @enderror
        </div>
        <div class="field">
            <label for="body">Post body</label>
            <textarea name="body" id="body" rows="6" placeholder="Body">{{old('body')}}</textarea>
            @error('body')
            <p>{{$errors->first('body')}}</p>
            @enderror
        </div>
        <div class="field half">
            <label for="tags">Tags</label>
            {{-- name="tags[]" means that on submit we will pass an array of selected values, if it was name="tags" then we would only pass one --}}
            <select multiple name="tags[]">
                @foreach ($tags as $tag )
                <option value={{$tag->id}}>{{$tag->name}}</option>
                @endforeach
            </select>
            @error('tags')
            {{-- another way to dispaly error message --}}
            <p>{{$message}}</p>
            @enderror
        </div>
        <ul class="actions">
            <li><input value="Create Post" class="button alt" type="submit"></li>
        </ul>
    </form>
</div>
@endsection