@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Post Create</h1>

        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    required maxlength="200" minlength="3">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title">Title</label>
                <textarea type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    id="title" required maxlength="200" minlength="3">
                                @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <textarea type="url" class="form-control @error('image') is-invalid @enderror" name="image" id="image"
                        required maxlength="200" minlength="3">
                    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror





        </section>
@endsection
