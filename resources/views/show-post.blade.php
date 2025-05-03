@extends('layouts.main')

@section('before')
    <div id="edit-container">
        <h2><a href="{{ route('panel') }}">←Powrót do publicystyki</a></h2>
    </div>
@endsection

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    {{ $post->content }}</p>
@endsection
