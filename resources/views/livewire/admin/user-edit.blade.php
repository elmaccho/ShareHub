<div>
    <div class="modal fade" id="edit-modal-{{ $userId }}" tabindex="-1" role="dialog" aria-labelledby="info-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPostLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
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
    
                        <p>Name: <input class="form-control" type="text" name="" id="" value="{{ $user->name }}"></p>
                        <p>Surname: <input class="form-control" type="text" name="" id="" value="{{ $user->surname }}"></p>
                        <p>Email: <input class="form-control" type="text" name="" id="" value="{{ $user->email }}"></p>
                        <p>Role: 
                            <select class="form-select" name="user_role" id="user_role">
                                @foreach (App\Enums\UserRole::TYPES as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </p>
    
                        <hr>
                        <h5>Address</h5>
                            <label for="countryList">Country:</label>
                            <select name="country" class="form-select mb-2" id="countryList">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>

                            <label for="stateList">State:</label>
                            <select name="state" class="form-select mb-2" id="stateList">
                            </select>

                            <label for="cityList">City:</label>
                            <select name="city"class="form-select mb-2" id="cityList">
                            </select>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>