@extends('layouts.admin.app')
@section('title', 'ADMIN PANEL')

@section('content')
    <div class="row m-0">
        <h1>@yield('title')</h1>
    
        {{-- <button x-data x-on:click="$dispatch('open-modal', { name : 'test1' })" class="btn btn-primary">Open modal1</button>
        <button x-data x-on:click="$dispatch('open-modal', { name : 'test2' })" class="btn btn-primary">Open modal2</button> --}}

        <div id="dashboard-content">
            @yield('something')
        </div>
    </div>
@endsection