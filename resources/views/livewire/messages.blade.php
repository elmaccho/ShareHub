<div>
    @if (session('success'))
        <span>{{ session('success') }}</span>
    @endif

    <form wire:submit="createNewUser" action="">
        <input wire:model="name" type="text" placeholder="name">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror<br>

        <input wire:model="surname" type="text" placeholder="surname">
        @error('surname')
            <span class="text-danger">{{ $message }}</span>
        @enderror<br>

        <input wire:model="email" type="email" placeholder="email">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror<br>

        <input class="form-control" wire:model="password" type="password" placeholder="password">
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror<br>
        
        <button>Create</button>
    </form>

    <hr>

    @foreach ($users as $user)
        <p>{{ $user->name }}</p>
    @endforeach
</div>