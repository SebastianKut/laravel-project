@extends('layout')

@section('content')

<section id="three" class="wrapper align-center">
    <div class="inner">
        <div class="flex flex-2">
            @forelse ($posts as $post)
            <article>
                <header>
                    <h3>{{$post->title}}</h3>
                </header>
                <p>{{$post->body}}</p>
                <footer>
                    <a href="/posts/{{$post->slug}}" class="button">Learn More</a>
                </footer>
            </article>
            @empty
            <p>There are no articles yet</p>
            @endforelse


        </div>
    </div>
</section>

{{-- check if method links() exists - depends on if statement in PostController@index method. If returned as pagination it will if its just normal collection it wont--}}
@if(method_exists($posts, 'links'))
{{ $posts->links() }}
@endif


@endsection