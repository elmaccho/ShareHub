<div>
    <form method="post" wire:submit.prevent="updatePost" enctype="multipart/form-data">
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
                <div class="mb-3 d-flex gap-3">
                    @if ($post->hasImage())
                        @foreach($post->postImage as $image)
                            <div class="post-image-wrapper">
                                <a class="text-decoration-none" href="{{ asset('storage/'. $image->file_path) }}" data-lightbox="post-{{ $post->id }}">
                                    <img class="post-image-edit" src="{{ asset('storage/'. $image->file_path) }}" alt="">
                                </a>
                                <button type="button" class="btn btn-danger deleteImgBtn" wire:click="deletePhoto({{ $image->id }})"><i class="fa-solid fa-trash-can"></i></button>
                            </div>
                        @endforeach
                    @endif
                    @foreach ($images as $image)
                        <div class="post-image-wrapper">
                            <img class="post-image-edit" src="{{ $image->temporaryUrl() }}" alt="">
                        </div>
                    @endforeach

                    <label for="image-upload" id="upload-icon" class="form-label sh-pointer">
                        <div class="add-image-btn-wrapper">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                    </label>
                    <input type="file" class="form-control d-none" id="image-upload" accept="image/*" wire:model="images" multiple>


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
