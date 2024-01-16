@extends('layouts.admin.app')
@section('title', 'ADMIN PANEL')

@section('content')
    <div class="row m-0">
        <h1>@yield('title')</h1>

        <div id="dashboard-content">
            @yield('something')
        </div>
    </div>
@endsection