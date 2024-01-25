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
                        <a class="text-decoration-none" href="{{ route('profile.index', $reportedPost->reportedPost) }}">{{ $reportedPost->reportedPost->user->name }}'s {{ $reportedPost->reportedPost->user->surname }}</a>
                         post for <strong class="text-danger">{{ $reportedPost->category }}</strong>
                    </p>
                    <p class="mb-3">Reason: <strong class="text-info">{{ $reportedPost->reason ?? 'Unknown' }}</strong></p>

                    <div class="row m-0 mb-4">
                        @livewire('admin.user-report', ['reportId' => $reportedPost->id])
                        <button type="button" class="btn btn-outline-danger mb-1" data-bs-toggle="collapse" data-bs-target="#banForm{{ $reportedPost->id }}" aria-expanded="false" aria-controls="banForm{{ $reportedPost->id }}">
                            Ban
                        </button>
                    </div>

                    <div class="collapse" id="banForm{{ $reportedPost->id }}">
                        {{-- @livewire('admin.ban-form', [
                            'userId' => $reportedPost->reportedPost->id,
                            'category' => $reportedPost->category,
                            'reason' => $reportedPost->reason
                            ]) --}}
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