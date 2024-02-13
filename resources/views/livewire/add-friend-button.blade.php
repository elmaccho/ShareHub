<div class="row col-5">
    @if ($loggedUser->isFriendWith($userId))
        <button class="btn btn-primary"><i class="fa-solid fa-user-minus"></i> Delete friend</button>    
        @else

        @if ($loggedUser->hasFriendRequest($userId))
        <div class="d-flex flex-row">
            @livewire('accept-friend-request', [
                'requester' => $userId,
                'requested' => $loggedUser,
            ])
            @livewire('delete-friend-request', [
                'requester' => $userId,
                'requested' => $loggedUser,
            ])
        </div>
        @else
            @if (!$loggedUser->hasSentFriendRequest($userId))
                    <button class="btn btn-primary" wire:click="addFriend"><i class="fa-solid fa-user-plus"></i> Add friend</button>
                @else
                    <button class="btn btn-primary"><i class="fa-regular fa-envelope"></i> Invitation sended</button>
            @endif
        @endif
    @endif
</div>