@props(['name', 'title', 'user'])
<div 
    x-data = "{ show : false , name : '{{ $name }}' }"
    x-show = "show"
    x-on:open-modal.window = "show = ($event.detail.name === name)"
    x-on:close-modal.window = "show = false"
    x-on:keydown.escape.window = "show = false"
    style="display:none;"
    class="modal-position"
    x-transition
    >
    <div x-on:click="show = false" class="modal-background"></div>

    <div class="modal-container">
        <div class="modal-header">
            @if (isset($title))
                {{ $title ?? '' }}
            @endif
            <button x-on:click="$dispatch('close-modal')" class="btn btn-danger btn-sm">X</button>
        </div>
        <div class="modal-body">
            @if (isset($user))
                {{ $user->name }}
            @endif
        </div>
    </div>
</div>
@vite('resources/css/modal.css')