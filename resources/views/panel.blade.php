@extends('layouts.main')

@section('content')
    <div class="panel">
        <h1>Panel administratora</h1>

        <a href="{{ route('post.create') }}"><button class="button">Dodaj post</button></a>

        <div class="admin-post">
            @foreach(App\Models\Post::all() as $post)
            <div class="article">
                <a href="{{ route('post.show', ['post' => $post]) }}"><h1>{{ $post->title }}</h1></a>

                <img src="https://placehold.co/350x200" alt="article image">

                <p>{{ Str::limit($post->content, 200) }}
                    {{ strlen($post->content) > 200 ? "[...]" : '' }}
                </p>

                <a href="{{ route('post.edit', ['post' => $post]) }}"><button id="edit-button" class="button">Edytuj</button></a>

                <form id="admin-form" action="{{ route('post.destroy', ['post' => $post]) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button id="delete-button" class="button button-delete">Usuń</button>
                </form>

            </div>
        @endforeach
        </div>
    </div>
@endsection
