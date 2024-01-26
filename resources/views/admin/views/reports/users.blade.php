@extends('admin.dashboard')

@section('title', 'Reported Users')

@section('something')

@forelse ($reportedUsers as $reportedUser)
    <div class="accordion" id="accordionExample{{ $reportedUser->id }}">
        <div class="accordion-item mb-2">
            <h2 class="accordion-header" id="heading{{ $reportedUser->id }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $reportedUser->id }}" aria-expanded="false" aria-controls="collapse{{ $reportedUser->id }}">
                    {{ $reportedUser->category }}
                </button>
            </h2>
            <div id="collapse{{ $reportedUser->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $reportedUser->id }}" data-bs-parent="#accordionExample{{ $reportedUser->id }}">
                <div class="accordion-body">
                    <p>
                        <a class="text-decoration-none" href="{{ route('profile.index', $reportedUser->reporter->id) }}">{{ $reportedUser->reporter->name }} {{ $reportedUser->reporter->surname }}</a>
                        reported <a class="text-decoration-none" href="{{ route('profile.index', $reportedUser->reportedUser->id) }}">{{ $reportedUser->reportedUser->name }} {{ $reportedUser->reportedUser->surname }}</a>
                        for <strong class="text-danger">{{ $reportedUser->category }}</strong>
                    </p>
                    <p class="mb-3">Reason: <strong class="text-info">{{ $reportedUser->reason ?? 'Unknown' }}</strong></p>

                    <div class="row m-0 mb-4">
                        @livewire('admin.user-report', ['reportId' => $reportedUser->id, 'type' => 'user'])
                        <button type="button" class="btn btn-outline-danger mb-1" data-bs-toggle="collapse" data-bs-target="#banForm{{ $reportedUser->id }}" aria-expanded="false" aria-controls="banForm{{ $reportedUser->id }}">
                            Ban
                        </button>
                    </div>

                    <div class="collapse" id="banForm{{ $reportedUser->id }}">
                        @livewire('admin.ban-form', [
                            'userId' => $reportedUser->reportedUser->id,
                            'category' => $reportedUser->category,
                            'reason' => $reportedUser->reason
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