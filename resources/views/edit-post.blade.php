@extends('layouts.main')

@section('content')
    <div id="edit-container">
        <h2><a href="{{ route('panel') }}">←Powrót</a></h2>
        <h1>Edycja postu</h1>
    </div>

    <form action="">
        <div>
            <input id="edit-title" type="text" value="{{ $post->title }}">
        </div>

        <div>
            <small class="timestamps">Utworzony: {{ $post->created_at }}</small>
            <span>|</span>
            <small class="timestamps">Ostatnia aktualizacja: {{ $post->updated_at ? $post->updated_at : '-'}}<small>
        </div>

        <div id="edit-content-container">
            <textarea name="content" id="edit-content" cols="60" rows="20">{{ $post->content }}</textarea>
        </div>

        <div>
            <input type="submit" class="button" value="Edytuj">
            <input type="submit" class="button button-delete" value="Usuń">
        </div>
    </form>
@endsection
