<div>
    <h5>Category:</h5>
    <form action="" wire:submit.prevent="submit">
            <select class="form-select ban_category" name="ban_category" id="ban_category" wire:model="category" required>
                    <option value="" selected>Select Category</option>
                    @foreach (App\Enums\BanReason::TYPES as $role)
                        <option value="{{ $role }}">{{ $role }}</option>
                    @endforeach
            </select>

            @error('category')
                <p class="text-danger">Select Category</p>
            @enderror


        <div class="row m-0 mb-1 mt-3">
            <textarea class="form-control" name="ban_reason" id="" cols="30" rows="4" wire:model="reason"></textarea>
        </div>

        <h5>Duration</h5>
        <select class="form-select ban_category mb-3" name="ban_category" id="ban_category" wire:model="banDuration">
            <option value="7">7 days</option>
            <option value="30">30 days</option>
            <option value="60">60 days</option>
            <option value="0">Forever</option>
        </select>

        <div class="row m-0">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
    </form>
</div>