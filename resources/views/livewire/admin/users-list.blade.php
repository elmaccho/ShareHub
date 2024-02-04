<div class="mb-3">
    <input class="form-control mb-2" wire:model.live="search" placeholder="Search..." aria-label="Search" type="search">

    <div class="users-container mb-3">
        @forelse ($users as $user)
        <div class="user-card mb-2">
            <span class="d-flex align-items-center gap-3">
                @if (!is_null($user->profile_image_path))
                    <img class="profile-image" src="{{ asset('storage/'. $user->profile_image_path) }}" alt="">
                @else
                    <img class="profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="">
                @endif
        
                <div class="user-info">
                    <div class="user-sur-name me-3">
                        {{ $user->name }}
                        {{ $user->surname }}
                    </div>
        
                    <strong>{{ $user->email }}</strong>
                </div>
            </span>

            <div class="action-buttons">
                <button class="btn btn-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#status-modal-{{ $user->id }}">
                    <i class="fa-solid fa-gavel"></i>
                </button>

                <button class="btn btn-success btn-sm"  data-bs-toggle="modal" data-bs-target="#edit-modal-{{ $user->id }}">
                    <i class="fa-solid fa-pencil"></i>
                </button>

                <button class="btn btn-info btn-sm info-btn"  data-bs-toggle="modal" data-bs-target="#info-modal-{{ $user->id }}">
                    <i class="fa-solid fa-info"></i>
                </button>
            </div>
        </div>

        <div class="modal fade" id="info-modal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="info-modal-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPostLabel">User Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="image-row">
                            @if (!is_null($user->profile_image_path))
                                    <img class="profile-image" src="{{ asset('storage/'. $user->profile_image_path) }}" alt="">
                                @else
                                    <img class="profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="">
                            @endif
                        </div>
    
                        <p>Name: {{ $user->name }}</p>
                        <p>Surname: {{ $user->surname }}</p>
                        <p>Email: {{ $user->email }}</p>
                        <p>Role: <strong>{{ $user->role }}</strong></p>
    
                        <hr>
                        <h5>Address</h5>
                        <p>Country: {{ $user->country->name ?? 'Unknown' }}</p>
                        <p>State: {{ $user->state->name ?? 'Unknown' }}</p>
                        <p>City: {{ $user->city->name ?? 'Unknown' }}</p>
    
                        <hr>
                        <h5>Activity</h5>
                        <p>Posts count: {{ $user->post->count() }}</p>
                        <p>Comments count: {{ $user->comment->count() }}</p>
                        <p>Likes count: {{ $user->likes->count() }}</p>
    
                        <hr>
                        <h5>Posts</h5>
                        @forelse ($user->post as $post)
                            <div class="card mb-1">
                                <div class="card-body d-flex justify-content-between">
                                    {{ $post->title }}
    
                                    <div class="action-buttons">
                                        @if (Auth::user()->isAdmin() || Auth::user()->isModerator() || Auth::user()->isOwnerOfPost($post))
                                            <a href="{{ route('post.edit', $post->id) }}"><button class="btn btn-success btn-sm"><i class="fa-solid fa-pencil"></i></button></a>
                                            <button class="btn btn-danger btn-sm delete-post-btn" data-post-id={{ $post->id }}><i class="fa-regular fa-trash-can"></i></button>
                                        @endif
                                    </div>
                                </div>
    
                            </div>
                            @empty
                                <p class="text-info"><strong>No posts</strong></p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="modal fade" id="edit-modal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="info-modal-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPostLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" wire:submit.prevent="update">
                            <div class="image-row mb-4 d-flex flex-column">
                                @if (!is_null($user->profile_image_path))
                                        <img class="profile-image mb-3" src="{{ asset('storage/'. $user->profile_image_path) }}" alt="">
                                    @else
                                        <img class="profile-image mb-3" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="">
                                @endif
        
                                <label for="image-upload" class="form-label sh-pointer">
                                    <div type="button" class="btn btn-primary">Change Profile Image</div>
                                </label>
                                <input type="file" class="form-control d-none" id="image-upload" name="settings[image]" accept="image/*">
                            </div>
        
                            <p>Name: <input class="form-control" autocomplete="name" type="text" name="name" value="{{ $user->name }}" wire:model="name"></p>
                            <p>Surname: <input class="form-control" autocomplete="surname" type="text" name="surname" value="{{ $user->surname }}" wire:model="surname"></p>
                            <p>Email: <input class="form-control" autocomplete="email" type="text" name="email" value="{{ $user->email }}"></p>
                            <p>Role: 
                                <select class="form-select" name="user_role" id="user_role" wire:model="role">
                                    @foreach (App\Enums\UserRole::TYPES as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </p>
                            
                            <hr>
                            <h5>Address</h5>
                            <label for="countryList_{{ $loop->index }}">Country:</label>
                            <select name="country" class="form-select mb-2" id="countryList_{{ $loop->index }}" wire:model="country_id">
                                <option value="" selected>Select Country</option>
                                    @if (!is_null($user->country))
                                        <option value="{{ $user->country->id }}" selected>{{ $user->country->name }}</option>
                                    @endif
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
    
                                <label for="stateList_{{ $loop->index }}">State:</label>
                                <select name="state" class="form-select mb-2" id="stateList_{{ $loop->index }}" wire:model="state_id">
                                    @if (!is_null($user->state))
                                        <option value="{{ $user->state->id }}" selected>{{ $user->state->name }}</option>
                                    @endif
                                </select>
    
                                <label for="cityList_{{ $loop->index }}">City:</label>
                                <select name="city"class="form-select mb-2" id="cityList_{{ $loop->index }}" wire:model="city_id">
                                    @if (!is_null($user->city))
                                        <option value="{{ $user->city->id }}" >{{ $user->city->name }}</option>
                                    @endif
                                </select>
    
                                <div class="row m-0 mt-5">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                        </form>
    
                    </div>
                </div>
            </div>
        </div> --}}
            {{-- @livewire('admin.user-details', ['userId' => $user->id]) --}}
            @livewire('admin.user-edit', ['userId' => $user->id])
            {{-- @livewire('admin.user-status', ['userId' => $user->id]) --}}
        @empty
            <p>No Matching Records...</p>
        @endforelse
    </div>
    {{ $users->links() }}
</div>