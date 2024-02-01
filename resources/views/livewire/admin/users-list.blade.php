<div class="mb-3">
    <input class="form-control mb-2" wire:model.live="search" placeholder="Search..." aria-label="Search" type="search">

    <div class="users-container mb-3">
        @foreach ($users as $user)
            <div class="user-card mb-2">
                <span class="d-flex align-items-center gap-3">
                    @if (!is_null($user->profile_image_path))
                        <img class="profile-image" src="{{ asset('storage/'. $user->profile_image_path) }}" alt="">
                    @else
                        <img class="profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="">
                    @endif
            
                    <div class="user-info">
                        <div class="user-sur-name me-3">
                            {{ $user->name }}
                            {{ $user->surname }}
                        </div>
            
                        <strong>{{ $user->email }}</strong>
                    </div>
                </span>

                <div class="action-buttons">
                    <button class="btn btn-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#status-modal-{{ $user->id }}">
                        <i class="fa-solid fa-gavel"></i>
                    </button>

                    <button class="btn btn-success btn-sm"  data-bs-toggle="modal" data-bs-target="#edit-modal-{{ $user->id }}">
                        <i class="fa-solid fa-pencil"></i>
                    </button>

                    <button class="btn btn-info btn-sm info-btn"  data-bs-toggle="modal" data-bs-target="#info-modal-{{ $user->id }}">
                        <i class="fa-solid fa-info"></i>
                    </button>
                </div>
            </div>
            @livewire('admin.user-details', ['userId' => $user->id])
            @livewire('admin.user-edit', ['userId' => $user->id])
            @livewire('admin.user-status', ['userId' => $user->id])
        @endforeach

    </div>
    {{ $users->links() }}
</div>