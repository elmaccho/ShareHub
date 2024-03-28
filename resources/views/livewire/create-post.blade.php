<div class="create-post-wrapper">
    <form class="d-flex flex-column gap-5" method="POST" action="" enctype="multipart/form-data" wire:submit.prevent="submit">
        <div class="sh-section">
            <div class="mb-3">
                <input type="text" class="form-control create-post-input-text" id="title" name="title" placeholder="Title..." wire:model="title" required>
            </div>
            <div class="mb-3">
                <select class="form-control create-post-input-text" name="" id="" required>
                    <option value="" selected>Select Category</option>
                    <option value="test">123</option>
                </select>
            </div>
            <div class="mb-3">
                <textarea class="form-control" id="content" name="content" rows="4" placeholder="Content..." wire:model="content"></textarea>
            </div>
            <label for="image-upload" id="upload-icon" class="form-label sh-pointer">
                <i class="fa-solid fa-image"></i> Add Pictures
            </label>
            <input type="file" class="form-control d-none fileInput" id="image-upload" accept="image/*" wire:model="images" multiple>
        </div>
        @if (count($images) > 0)            
            <div class="sh-section">
                <div class="tmp-wrapper">
                    @foreach ($images as $image)
                        <span class="tmp-card-wrapper" wire:key="{{ $loop->index }}">
                            <div class="image-wrapper me-2">
                                <a class="text-decoration-none" href="{{ $image->temporaryUrl() }}" data-lightbox="tmp-{{ $loop->index }}">
                                    <img class="thumbnail-image" src="{{ $image->temporaryUrl() }}" alt="">
                                </a>
                            </div>
                            <button class="btn btn-danger rounded tmp-delete-button" wire:click.prevent="deleteTmpImage({{ $loop->index }})">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </span>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="row m-0 p-0">
            <button type="submit" class="btn btn-primary">Post</button>
        </div>
    </form>
    @vite('resources/css/create-post.css')
</div>