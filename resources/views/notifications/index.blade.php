@extends('layouts.app')
@section('title', 'ShareHub - Notifications')
@section('content')
<div class="container d-flex flex-column align-items-center gap-4">
    <div class="col-10 d-flex flex-column align-items-center">
        <h5>Notifications</h5>
        <div class="d-flex gap-2">
            <button class="btn btn-main btn-sm">All</button>
            <button class="btn btn-main btn-sm">Friends request</button>
            <button class="btn btn-main btn-sm">Chat</button>
            <button class="btn btn-main btn-sm">Activity</button>
        </div>
    </div>

    <div class="sh-section col-3" style="width: 800px;">ebez</div>
</div>
@vite('resources/css/home.css')
@endsection