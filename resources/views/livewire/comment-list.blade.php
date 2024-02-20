<<<<<<< HEAD
<div class="post-comments-section mb-3">
    @forelse ($comments as $comment)
        <div class="card mb-2 comment-body" wire:key="comment-{{ $comment->post->id }}">
            <div class="dropdown comment-action">
                <button class="btn btn-link text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis comment-action-btn"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        @livewire('report-button', [
                            'type' => 'comment',
                            'targetId' => $comment->id,
                        ])
                    </li>
                  <li><button type="button" class="dropdown-item">Edit</button></li>
                  <li><button type="button" class="dropdown-item delete-comment-btn" data-comment-id={{ $comment->id }}>Delete</button></li>
                </ul>
            </div>
=======
<div class="card mb-2 comment-body">
    <div class="dropdown comment-action">
        <button class="btn btn-link text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-ellipsis comment-action-btn"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li>
                @livewire('report-button', [
                    'type' => 'comment',
                    'targetId' => $comment->id,
                ])
            </li>
            @if (Auth::user()->isAdmin() || Auth::user()->isModerator() || Auth::user()->isOwnerOfComment($comment))
                <li><button type="button" class="dropdown-item">Edit</button></li>
                <li><button type="button" class="dropdown-item delete-comment-btn">Delete</button></li>
            @endif
        </ul>
    </div>
>>>>>>> 54e27fd

    <div class="card-body">
        <div class="d-flex align-items-center">
            <a href="{{ route('profile.index', $comment->user->id) }}">
            @if (!is_null($comment->user->profile_image_path))
                    <img class="user-profile-image" src="{{ asset('storage/'. $comment->user->profile_image_path) }}" alt="{{ $comment->user->name }} {{ $comment->user->surname }}">
                @else
                    <img class="user-profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $comment->user->name }} {{ $comment->user->surname }}">
            @endif
            </a>
            <div>
            <h5 class="card-title mb-0"><strong>{{ $comment->user->name }} {{ $comment->user->surname }}</strong></h5>
            <small class="text-muted">{{ $comment->created_at }}</small>
            </div>
        </div>
        <p class="card-text mt-3">
            {{ $comment->content }}
        </p>
    </div>
</div>
