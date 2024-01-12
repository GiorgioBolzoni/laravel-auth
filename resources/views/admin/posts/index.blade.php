@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Post List</h1>
        <p>section content</p>
        @foreach ($posts as $post)
            <p><a href="{{ route('admin.posts.show', $posts->id) }}">{{ $post->title }}</a></p>
        @endforeach
    </section>
@endsection
