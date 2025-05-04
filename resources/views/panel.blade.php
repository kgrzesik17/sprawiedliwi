@extends('layouts.main')

@section('content')
    <div class="panel">
        <h1>Panel administratora</h1>
        <div>
            <p>Jesteś zalogowany jako: <strong>{{ Auth::user()->name }}</strong></p>
        </div>

        <div class="panel-container">
            <h2>Użytkownicy</h2>

            <a href="{{ route('show.register') }}"><button class="button" type="submit">Dodaj administratora</button></a>
        </div>

        <div class="panel-container">
            <h2>Posty</h2>
            <a href="{{ route('post.create') }}"><button class="button">Dodaj post</button></a>

            <div class="admin-post">
                {{-- @foreach(App\Models\Post::all() as $post) --}}
                @foreach(App\Models\Post::orderBy('id', 'DESC')->get() as $post)
                <div class="article">
                    <a href="{{ route('post.show', ['post' => $post]) }}"><h1>{{ $post->title }}</h1></a>

                    @if($post->author)
                        <p>Autor: {{ $post->author->name }}</p>
                    @else
                        <p>Autor: Anonymous</p>
                    @endif

                    @if(!is_null($post->path))
                        <img id="panel-post-img" src="{{ asset('images/' . $post->path) }}" alt="image">
                    @else
                        <img id="panel-post-img" src="https://placehold.co/350x200" alt="article image">
                    @endif

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
    </div>
@endsection
