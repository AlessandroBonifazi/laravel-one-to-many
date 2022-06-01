@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
        @csrf
        @method('PUT')
        {{-- Title --}}
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Scrivi un titolo..."
                value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- Category --}}
        <div class="form-group">
            <label for="title">Categoria</label>
            <select name="category_id">
                <option value="">Scegli categoria</option>
                @foreach ($categories as $category) {
                    <option value="{{$category->id}}" 
                        {{$category->id == old('category_id', $post->category_id) ? 'selected' : ''}}>
                        {{$category->name}}</option>
                }
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- Content --}}
        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control" name="content" id="content" rows="3">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <input class="btn btn-primary" type="submit">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endsection