@extends('layout')

@section('content')

<section id="three" class="wrapper align-center">
    <div class="inner">
        <div class="flex flex-2">
            @foreach($posts as $post)
            <article>
                <header>
                    <h3>{{$post->title}}</h3>
                </header>
                <p>{{$post->body}}</p>
                <footer>
                    <a href="/posts/{{$post->slug}}" class="button">Learn More</a>
                </footer>
            </article>
            @endforeach
        </div>
    </div>
</section>

{{$posts->links()}}

@endsection
