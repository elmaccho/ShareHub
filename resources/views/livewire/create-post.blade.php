<div class="sh-edit">
    <form method="post" enctype="multipart/form-data"  wire:submit.prevent="submit">
        <div class="mb-3">
            <input type="text" class="form-control" id="title" name="title" placeholder="Title..." wire:model="title" required>
        </div>
        <div class="mb-3">
            <textarea class="form-control" id="content" name="content" rows="4" placeholder="Content..." wire:model="content"></textarea>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Post</button>
            <label for="image-upload" id="upload-icon" class="form-label sh-pointer">
                <i class="fa-solid fa-image"></i>
            </label>
            <input type="file" class="form-control d-none" id="image-upload" accept="image/*" wire:model="images" multiple>


        </div>
    </form>
    <div class="d-flex">
        @foreach ($images as $image)
            <div class="thumbnail-wrapper me-2">
                <img class="thumbnail-image" src="{{ $image->temporaryUrl() }}" alt="">
            </div>
        @endforeach
    </div>
</div>