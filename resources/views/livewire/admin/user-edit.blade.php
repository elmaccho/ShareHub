<div>
    <div class="modal fade" id="edit-modal-{{ $userId }}" tabindex="-1" role="dialog" aria-labelledby="info-modal-label" aria-hidden="true">
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
    </div>
</div>
@vite('resources/js/location_picker.js')