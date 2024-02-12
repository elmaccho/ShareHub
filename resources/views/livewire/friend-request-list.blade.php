<div>
    @if ($loggedUser->hasFriendRequest())
    <div class="notification-ui_dd-content">
        <div class="text-center mb-3">
            <strong>You got a Friend Request!</strong>
        </div>
        @foreach ($friendRequests as $friendRequest)
            <div class="notification-list notification-list--unread">
                <div class="notification-list_content">
                    <div class="notification-list_img">
                        @if (!is_null($friendRequest->requester->profile_image_path))
                                <img src="{{ asset('storage/'. $friendRequest->requester->profile_image_path) }}" alt="">
                            @else
                                <img src="{{ asset('storage/user_profile/userDefault.png') }}" alt="">
                        @endif 
                    </div>
                    <div class="notification-list_detail">
                            <p>
                                <a class="text-decoration-none text-dark" href="{{ route('profile.index', $friendRequest->requester->id) }}"><strong>{{ $friendRequest->requester->name }} {{ $friendRequest->requester->surname }}</strong></a> sends you a friend request
                            </p>
                                <small>{{ $friendRequest->getReadableCreatedAt() }}</small>
                            </p>
                    </div>
                </div>
                <div class="notification-list_feature-img d-flex gap-1">
                    @livewire('accept-friend-request')
                    @livewire('delete-friend-request')
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>
