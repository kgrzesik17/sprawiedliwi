@extends('layouts.main')

@section('content')
    <div id="edit-container">
        <h2><a href="{{ route('panel') }}">←Powrót</a></h2>
        <h1>Edycja postu</h1>
    </div>

    <form action="{{ route('post.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <input id="edit-title" name="title" type="text" value="{{ $post->title }}">

            <select name="category_id" id="category_id">
                {{-- <option value="{{ $post->category->id }}">{{ $post->category->category_name }}</option> --}}

                @foreach(App\Models\Category::all() as $category)
                    <option {{ ($category->id === $post->category->id) ? 'selected="selected"' : "" }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <small class="timestamps">Utworzony: {{ $post->created_at }}</small>
            <span>|</span>
            <small class="timestamps">Ostatnia aktualizacja: {{ $post->updated_at ? $post->updated_at : '-'}}<small>
        </div>

        <div id="edit-content-container">
            <textarea name="content" id="edit-content" cols="60" rows="20">{{ $post->content }}</textarea>
        </div>

        @if($post->path)
            <img id="edit-post-image" src="{{ asset('images/' . $post->path) }}" alt="">
        @endif

        <div id="input-file-container">
            <input type="file" name="input_file" id="input_file">
        </div>

        <div>
            <input type="submit" class="button" value="Edytuj">
        </form>

        <form id="form-inline" action="{{ route('post.destroy', ['post' => $post]) }}" method="POST">
            @csrf
            @method('DELETE')

            <input type="submit" class="button button-delete" value="Usuń">
        </form>
        </div>

@endsection
