@extends('admin.dashboard')

@section('title', 'Reported Comments')

@section('something')

@forelse ($reportedComments as $reportedComment)
<div class="accordion" id="accordionExample{{ $reportedComment->id }}">
    <div class="accordion-item mb-2">
        <h2 class="accordion-header" id="heading{{ $reportedComment->id }}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $reportedComment->id }}" aria-expanded="false" aria-controls="collapse{{ $reportedComment->id }}">
                {{ $reportedComment->category }}
            </button>
        </h2>
        <div id="collapse{{ $reportedComment->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $reportedComment->id }}" data-bs-parent="#accordionExample{{ $reportedComment->id }}">
            <div class="accordion-body">
                <p>
                    <a class="text-decoration-none" href="{{ route('profile.index', $reportedComment->reporter->id) }}">{{ $reportedComment->reporter->name }} {{ $reportedComment->reporter->surname }}</a>
                    reported <a class="text-decoration-none" href="{{ route('profile.index', $reportedComment->reportedComment->user->id) }}">{{ $reportedComment->reportedComment->user->name }}'s {{ $reportedComment->reportedComment->user->surname }}</a>
                    comment for <strong class="text-danger">{{ $reportedComment->category }}</strong>
                    
                </p>
                <p class="mb-3">Reason: <strong class="text-info">{{ $reportedComment->reason ?? 'Unknown' }}</strong></p>
                <hr>
                <div class="post-info">
                    <p>Content: {{ $reportedComment->reportedComment->content }}</p>
                </div>

                <div class="row m-0 mb-4">
                    @livewire('admin.user-report', ['reportId' => $reportedComment->id, 'type'=> 'comment'])
                    @livewire('admin.delete-target', [
                        'targetId' => $reportedComment->reportedComment->id, 
                        'reportId' => $reportedComment->id,
                        'type' => 'comment'
                        ])
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