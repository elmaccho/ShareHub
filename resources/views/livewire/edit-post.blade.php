<div>
    <form wire:submit.prevent="updatePost">
        <div class="card border-0">
            <div class="card-body">
                <div class="row author">
                    <div class="icon-box d-flex gap-2 mb-2">
                        @if (!is_null($post->user->profile_image_path))
                                <img class="user-profile-image" src="{{ asset('storage/'. $post->user->profile_image_path) }}" alt="{{ $post->user->name }} {{$post->user->surname}}">
                            @else
                                <img class="user-profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $post->user->name }} {{ $post->user->surname }}">
                        @endif
                        <div class="text-box">
                            <h5 class="m-0">{{ $post->user->name }} {{ $post->user->surname }}</h5>
                            <strong>Author </strong>
                            <i><i class="fa-regular fa-clock"></i> {{ $post->created_at->diffForHumans() }}</i>
                        </div>
                    </div>
                </div>
                <div class="img mb-3">
                    <img class="d-block img-fluid" src="https://www.bootdey.com/image/1000x280/87CEFA/000000" alt="First slide">
                </div>
                <input type="text" class="form-control mb-2" id="title" name="title" placeholder="Title..." required value="{{ $post->title }}" wire:model="postTitle">
                <textarea class="form-control" id="content" name="content" rows="4" placeholder="Content..." wire:model="postContent">{{ $post->content }}</textarea>
            </div>                     
        </div>
        <div class="row">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
