<div class="row col-5">
    @if ($loggedUser->hasFriendRequest())
        <div class="d-flex flex-row">
            @livewire('accept-friend-request')
            @livewire('delete-friend-request')
        </div>
    @else
            @if (!$loggedUser->hasSentFriendRequest())
                <button class="btn btn-primary" wire:click="addFriend({{ $userId }})"><i class="fa-solid fa-user-plus"></i> Add friend</button>
                @else
                <button class="btn btn-primary"><i class="fa-regular fa-envelope"></i> Invitation sended</button>
            @endif
    @endif
    {{-- <button class="btn btn-primary"><i class="fa-solid fa-user-minus"></i> Delete friend</button> --}}
</div>