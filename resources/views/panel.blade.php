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
            <h2>Kategorie</h2>

            <div>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    <input type="text" name="category_name" id="edit-title">
                    <input type="submit" value="Dodaj kategorię" class="button">
                </form>
            </div>

            <ul>
            @foreach (App\Models\Category::all() as $category)
                <form action="{{ route('category.destroy', ['category' => $category]) }}", method="POST">
                    @csrf
                    @method('DELETE')

                    <div id="panel-categories">
                        <li><h3>{{ $category->category_name }}<input type="submit" class="button button-delete" name="category-delete" id="category-delete" value="Usuń" onClick="return confirm('Na pewno chcesz usunąć kategorię: {{ $category->category_name }}? Wszystkie posty o tej kategorii stracą ją.')"></h3> </li>
                    </div>
                </form>
            @endforeach
            </ul>
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

                        <button id="delete-button" class="button button-delete" onClick="return confirm('Na pewno chcesz usunąć post o ID: {{ $post->id }}?')">Usuń</button>
                    </form>

                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection
