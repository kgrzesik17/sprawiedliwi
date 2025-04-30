@extends('layouts.main')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    {{ $post->content }}</p>
@endsection
