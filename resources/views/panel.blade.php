@extends('layouts.main')

@section('content')
    <div class="panel">
        <h1>Panel administratora</h1>

        <a href="#"><button class="button">Dodaj post</button></a>

        <div class="admin-post">
            @foreach(App\Models\Post::all() as $post)
            <div class="article">
                <a href="{{ route('post.show', ['post' => $post]) }}"><h1>{{ $post->title }}</h1></a>

                <img src="https://placehold.co/350x200" alt="article image">

                <p>{{ Str::limit($post->content, 200) }}
                    {{ strlen($post->content) > 200 ? "[...]" : '' }}
                </p>
                <a href="{{ route('post.edit', ['post' => $post]) }}"><button class="button">Edytuj</button></a>
                <a href="{{ route('post.show', ['post' => $post]) }}"><button class="button button-delete">Usuń</button></a>

            </div>
        @endforeach
        </div>
    </div>
@endsection
