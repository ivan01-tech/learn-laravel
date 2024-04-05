@extends('base')

@section('title', 'Accueil du blog')


@section('content')
    <h1>Mon blog laravel</h1>
    @foreach ($posts as $item)
        <article>
            <h3>
                <a href="{{ route('blog.show', ['slug' => $item->slug, 'post' => $item->id]) }}">

                    {{ $item->title }}
                </a>
            </h3>
        </article>
    @endforeach

    {{ $posts->links() }}

@endsection
