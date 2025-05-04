@extends('layouts.main')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    @if($post->path)
    <div>
        <img src="{{ asset('images/' . $post->path) }}" alt="">
    </div>
    @endif

    {{ $post->content }}</p>
@endsection
