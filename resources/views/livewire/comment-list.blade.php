<div>
    @forelse ($comments as $comment)
        <ul class="comment-reply list-unstyled" wire:key="comment-{{ $comment->id }}">
            <li class="d-flex gap-3">
                <div class="icon-box">
                    @if (!is_null($comment->user->profile_image_path))
                            <img class="user-profile-image" src="{{ asset('storage/'. $comment->user->profile_image_path) }}" alt="{{ $comment->user->name }} {{$comment->user->surname}}">
                        @else
                            <img class="user-profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $comment->user->name }} {{ $comment->user->surname }}">
                    @endif
                </div>
                <div class="text-box">
                    <h5 class="m-0">{{ $comment->user->name }} {{ $comment->user->surname }}</h5>
                    @if ($post->user->id == $comment->user->id)
                        <strong>Author </strong>    
                    @endif
                    <i><i class="fa-regular fa-clock"></i> {{ $comment->created_at->diffForHumans() }}</i>
                    <p>{{ $comment->content }}</p>
                </div>
                <div class="dropdown comment-action">
                    <button class="btn btn-link text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis comment-action-btn"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li>
                            @livewire('report-button', [
                                'type' => 'comment',
                                'targetId' => $comment->id,
                            ], key('report-button-'. $comment->id))
                        </li>
                        @if (Auth::user()->isAdmin() || Auth::user()->isModerator() || Auth::user()->isOwnerOfComment($comment))
                            <li><button type="button" class="dropdown-item">Edit</button></li>
                            <li><button type="button" class="dropdown-item delete-comment-btn">Delete</button></li>
                        @endif
                    </ul>
                </div>
            </li>
        </ul>                                        
        @empty
        <p class="mb-0">No comments yet...</p>
    @endforelse
</div>