<div>
    <form wire:submit="createNewUser" action="">
        <input wire:model="name" type="text" placeholder="name"><br>
        <input wire:model="surname" type="text" placeholder="surname"><br>
        <input wire:model="email" type="email" placeholder="email"><br>
        <input wire:model="password" type="password" placeholder="password"><br>
        
        <button>Create</button>
    </form>

    <hr>

    @foreach ($users as $user)
        <p>{{ $user->name }}</p>
    @endforeach
</div>