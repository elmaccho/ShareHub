<div>
    @forelse ($notifications as $notification)
        @if (Auth::user()->id != $notification->sender->id)
        <div class="notification-list notification-list--unread">
            <div class="notification-list_content">
                <div class="notification-list_img">
                    @if (!is_null($notification->sender->profile_image_path))
                            <img src="{{ asset('storage/'. $notification->sender->profile_image_path) }}" alt="">
                        @else
                            <img src="{{ asset('storage/user_profile/userDefault.png') }}" alt="">
                    @endif 
                </div>
                <div class="notification-list_detail">
                    <p><a class="text-decoration-none text-dark" href=""><strong>{{ $notification->sender->name }} {{ $notification->sender->surname }}</strong></a> {{ $notification->content }} <a class="text-decoration-none" href="{{ route('postpage.index', $notification->receiver->post->first()->id ) }}"><strong>post</strong></a></p>
                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
                    <p class="text-muted"><small>{{ $notification->created_at->diffForHumans() }}</small></p>
                </div>
            </div>
            <div class="notification-list_feature-img">
            </div>
        </div>
        @endif

        {{-- <div class="notification-list">
            <div class="notification-list_content">
                <div class="notification-list_img">
                    @if (!is_null(Auth::user()->profile_image_path))
                            <img src="{{ asset('storage/'. Auth::user()->profile_image_path) }}" alt="">
                        @else
                            <img src="{{ asset('storage/user_profile/userDefault.png') }}" alt="">
                    @endif 
                </div>
                <div class="notification-list_detail">
                    <p><a class="text-decoration-none text-dark" href=""><strong>Brian Cumin</strong></a> reacted to your <a class="text-decoration-none" href=""><strong>comment</strong></a></p>
                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
                    <p class="text-muted"><small>10 mins ago</small></p>
                </div>
            </div>
            <div class="notification-list_feature-img">
            </div>
        </div> --}}
    @empty
        
    @endforelse

</div>
