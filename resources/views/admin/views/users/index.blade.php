@extends('admin.dashboard')

@section('title', 'Users')

@section('something')
    @livewire('admin.users-list')
@endsection
@section('javascript')
    const postdeleteUrl = "{{ url('admin/') }}/"
@endsection
@vite('resources/css/panel/users-list.css')
@vite('resources/js/post.js')