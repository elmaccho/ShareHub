@extends('layouts.app')
@section('title', $user->name . ' ' . $user->surname . ' Profile')
@section('content')  
<div class="container">
  @include('helpers.flash-messages')
  @livewire('user-settings')
</div>
@endsection
@vite('resources/css/settings.css')
@vite('resources/js/length_counter_about_bio.js')
@vite('resources/js/updatePreview.js')