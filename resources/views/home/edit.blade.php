@extends('layouts.app')
@section('content')
<div class="sh-edit">
    <form action="{{ route('post.edit', $post->id) }}" method="post">
        @csrf
        <div class="mb-3">
          <input type="text" class="form-control" id="title" name="title" placeholder="Title..." required value="{{ $post->title }}">
        </div>
        <div class="mb-3">
          <textarea class="form-control" id="content" name="content" rows="4" placeholder="Content...">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save</button>
            <label for="image-upload" id="upload-icon" class="form-label sh-pointer">
                <i class="fa-solid fa-image"></i>
            </label>
            <input type="file" class="form-control d-none" id="image-upload" name="image" accept="image/*">
        </div>
    </form>
</div>
@endsection
@vite('resources/css/home.css')
