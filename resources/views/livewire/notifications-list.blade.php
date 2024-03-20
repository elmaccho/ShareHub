<div>
    @forelse ($notifications as $notification)
        @if (Auth::user()->id != $notification->sender->id)
        <div class="notification-list {{ $notification->isReaded() ? '' : 'notification-list--unread' }}">
            <div class="notification-list_content">
                <div class="notification-list_img">
                    @if (!is_null($notification->sender->profile_image_path))
                            <img src="{{ asset('storage/'. $notification->sender->profile_image_path) }}" alt="">
                        @else
                            <img src="{{ asset('storage/user_profile/userDefault.png') }}" alt="">
                    @endif 
                </div>
                <div class="notification-list_detail">
                    <p>
                        <a class="text-decoration-none text-dark" href="{{ route('profile.index', $notification->sender->id) }}">
                            <strong>{{ $notification->sender->name }} {{ $notification->sender->surname }}</strong>
                        </a> {{ $notification->content }} 
                        <a class="text-decoration-none" href="{{ route('postpage.index', $notification->receiver->post->first()->id ) }}">
                            <strong>post</strong>
                        </a>
                    </p>
                    <p class="text-muted"></p>
                    <p class="text-muted"><small>{{ $notification->created_at->diffForHumans() }}</small></p>
                </div>
            </div>
            <div class="notification-list_feature-img">
                <button class="btn btn-info btn-sm" wire:click="readToggle({{ $notification->id }})">
                    {{ $notification->isReaded() ? 'Mark as Unread' : 'Mark as Read' }}
                </button>
            </div>
        </div>
        @endif
    @empty
    <div class="text-center mb-3">
        <strong>
            No activity yet...
        </strong>
    </div>
    @endforelse
</div>
