<div class="sh-section" style="max-width: 500px;">
    <strong>Friends: {{ $user->friends->count() }}</strong>    
    <hr class="m-0 mb-3">
    <div class="friends-wrapper">
        @foreach ($friends as $friend)
            <a href="{{ route('profile.index', $friend->friend->id) }}" class="friend-box">
                @if (!is_null($user->profile_image_path))
                    <img class="friend-profile" src="{{ asset('storage/'. $friend->friend->profile_image_path) }}" alt="{{ $friend->friend->name }} {{ $friend->friend->surname }}">
                @else
                    <img class="friend-profile" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $friend->friend->name }} {{ $friend->friend->surname }}">
                @endif
                <h5>
                    {{ $friend->friend->name }} <br>
                    {{ $friend->friend->surname }}
                </h5>
            </a>
        @endforeach
    </div>
    @if ($user->friends->count() > 3)
        <div class="row d-flex justify-content-center">
            <button class="btn btn-primary w-75 btn-sm" data-bs-toggle="modal" data-bs-target="#friendsList">All friends</button>
        </div>
    @endif

    <div class="modal fade" id="friendsList" tabindex="-1" aria-labelledby="friendsListLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="friendsListLabel">{{ $user->name }}'s Friends</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach ($fullList as $friend)
                    <a href="{{ route('profile.index', $friend->friend->id) }}" class="d-flex align-items-center gap-3 text-decoration-none text-dark mb-2">
                        @if (!is_null($user->profile_image_path))
                            <img class="friend-profile" src="{{ asset('storage/'. $friend->friend->profile_image_path) }}" alt="{{ $friend->friend->name }} {{ $friend->friend->surname }}">
                        @else
                            <img class="friend-profile" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $friend->friend->name }} {{ $friend->friend->surname }}">
                        @endif
                        <h5>
                            {{ $friend->friend->name }}
                            {{ $friend->friend->surname }}
                        </h5>
                    </a>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    @vite('resources/css/friends_list.css')
</div>