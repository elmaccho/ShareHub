@extends('admin.dashboard')

@section('title', 'Reported Posts')

@section('something')

    @forelse ($reportedPosts as $reportedPost)
    <div class="accordion" id="accordionExample{{ $reportedPost->id }}">
        <div class="accordion-item mb-2">
            <h2 class="accordion-header" id="heading{{ $reportedPost->id }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $reportedPost->id }}" aria-expanded="false" aria-controls="collapse{{ $reportedPost->id }}">
                    {{ $reportedPost->category }}
                </button>
            </h2>
            <div id="collapse{{ $reportedPost->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $reportedPost->id }}" data-bs-parent="#accordionExample{{ $reportedPost->id }}">
                <div class="accordion-body">
                    <p>
                        <a class="text-decoration-none" href="{{ route('profile.index', $reportedPost->reporter->id) }}">{{ $reportedPost->reporter->name }} {{ $reportedPost->reporter->surname }}</a>
                        reported 
                        <a class="text-decoration-none" href="{{ route('profile.index', $reportedPost->reportedPost->user->id) }}">{{ $reportedPost->reportedPost->user->name }}'s {{ $reportedPost->reportedPost->user->surname }}</a>
                         post for <strong class="text-danger">{{ $reportedPost->category }}</strong>
                    </p>
                    <p class="mb-3">Reason: <strong class="text-info">{{ $reportedPost->reason ?? 'Unknown' }}</strong></p>
                    <hr>
                    <div class="post-info">
                        <p>Title: {{ $reportedPost->reportedPost->title }}</p>
                        <p>Content: {{ $reportedPost->reportedPost->content ?? 'Unknown'}}</p>
                    </div>

                    <div class="row m-0 mb-4">
                        @livewire('admin.user-report', ['reportId' => $reportedPost->id, 'type'=> 'post'])
                        @livewire('admin.delete-target', [
                            'targetId' => $reportedPost->reportedPost->id, 
                            'reportId' => $reportedPost->id,
                            'type' => 'post'
                            ])
                        <a class="btn btn-success" href="{{ route('post.edit', $reportedPost->reportedPost->id) }}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
        <p>No Reports Found...</p>
    @endforelse

@endsection
@vite('resources/css/panel/users-list.css')