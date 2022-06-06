@extends('layouts.dashboard')

@section('content')
    <h3>Titolo</h3>
    <p>{{ $post->title }}</p>
    <h3>slug</h3>
    <p>{{ $post->slug }}</p>
    <h3>Category</h3>
    <p>{{ $post->category->name}}</p>
    <h3>content</h3>
    <p>{{ $post->content }}</p>

@endsection