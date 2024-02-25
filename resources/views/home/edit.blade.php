@extends('layouts.app')
@section('content')
<div id="main-content" class="blog-page">
  <div class="container">
      <div class="row ms-2 me-2">
            <livewire:edit-post :post="$post" wire:key="edit-post-{{ $post->id }}"/>
      </div>
  </div>
</div>
@endsection
@vite('resources/css/home.css')
@vite('resources/css/post_page.css')