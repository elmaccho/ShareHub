@extends('admin.dashboard')

@section('title', 'Banned Users')

@section('something')

<div class="d-flex flex-column gap-2">
    @forelse ($bannedUsers as $bannedUser)
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading{{ $bannedUser->user->id }}">
                <button class="accordion-button collapsed d-flex gap-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $bannedUser->user->id }}" aria-expanded="false" aria-controls="flush-collapseOne">
                    @if (!is_null($bannedUser->user->profile_image_path))
                            <img class="profile-image" src="{{ asset('storage/'. $bannedUser->user->profile_image_path) }}" alt="">
                        @else
                            <img class="profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="">
                    @endif

                    <div class="user-info">
                        <div class="user-sur-name me-3">
                            {{ $bannedUser->user->name }}
                            {{ $bannedUser->user->surname }}
                        </div>
            
                        <strong>{{ $bannedUser->user->email }}</strong>
                    </div>
                </button>
            </h2>
            <div id="flush-collapse{{ $bannedUser->user->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $bannedUser->user->id }}" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="row mb-0">
                        <p>Category: {{ $bannedUser->category }}</p>
                        <p>Reason: {{ $bannedUser->reason ?? 'Unknown' }}</p>
                        <p>Remaining days: {{ $bannedUser->remainingDays }}</p>
                        <p>Ban date: {{ \Carbon\Carbon::parse($bannedUser->start_date)->format('d/m/Y') }}</p>
                    </div>
                    <div class="row">
                        @livewire('admin.unban-button', [$bannedUser->user->id])
                    </div>
                </div>
            </div>
            </div>
        </div>
        @empty
            <h6>No Banned Users...</h6>
    @endforelse
</div>
@endsection
@vite('resources/css/panel/users-list.css')