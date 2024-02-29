<form wire:submit="addComment" class="commentForm" >
    <span>
        <input wire:model="comment" class="sh-input" type="text" name="comment" placeholder="Write your comment...">
        <button type="submit" class="btn btn-primary">Comment</button>
    </span>
    @error('comment') <span class="text-danger">{{ $message }}</span> @enderror
</form>