@extends('layout')

@section('content')
<!-- Three -->
<section id="three" class="wrapper align-center">
    <div class="inner">
        <div class="flex flex-2">
            @foreach($posts as $post)
            <article class="article__top">
                <div class="image round">
                    <img src="images/pic01.jpg" alt="Pic 01" />
                </div>
                <header>
                    <h3>{{$post->title}}</h3>
                </header>
                <p>{{$post->body}}</p>
                <footer>
                    <a href="#" class="button">Learn More</a>
                </footer>
            </article>
            @endforeach
        </div>
    </div>
</section>


@endsection
