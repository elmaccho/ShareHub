<form wire:submit.prevent="createComment" class="commentForm" >
    <input wire:model="comment" class="sh-input" type="text" name="comment" placeholder="Write your comment...">
    @error('comment') <span class="text-danger">{{ $message }}</span> @enderror
</form>