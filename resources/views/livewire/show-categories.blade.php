<div class="sh-section">
    <strong>Category:</strong>
    <form wire:submit.prevent="showCategory">
        <select name="" id="" class="form-control mb-3" wire:model=selectedCategory>
            <option value="" selected>All categories</option>
    
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>

        <div class="row m-0 p-0">
            <button class="btn btn-primary btn-sm" type="submit">Select</button>
        </div>
    </form>
</div>
