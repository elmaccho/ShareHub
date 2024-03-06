@extends('admin.dashboard')

@section('title', 'Users')

@section('something')
    @livewire('admin.users-list')
@endsection
@vite('resources/css/panel/users-list.css')