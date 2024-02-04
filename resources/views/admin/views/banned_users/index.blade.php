@extends('admin.dashboard')

@section('title', 'Banned Users')

@section('something')
    @livewire('admin.banned-users-list')
@endsection
@vite('resources/css/panel/users-list.css')