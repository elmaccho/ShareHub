<form method="post" enctype="multipart/form-data" wire:submit.prevent="submit">
      <div class="main-body">    
          <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center gap-3">
                      @if (!is_null($user->profile_image_path))
                            <img id="preview-image" class="rounded-circle" width="150" height="150" src="{{ asset('storage/'. $user->profile_image_path) }}" alt="{{ $user->name }} {{ $user->surname }}">
                        @else
                            <img id="preview-image" class="rounded-circle" width="150" height="150" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $user->name }} {{ $user->surname }}">
                      @endif
                      
                      <label for="image-upload" class="form-label sh-pointer">
                          <div type="button" class="btn btn-primary">Change Profile Image</div>
                      </label>
                      <input type="file" class="form-control d-none @error('image') is-invalid @enderror" id="image-upload" name="image" accept="image/*">

                      @error('image')
                          <spastrong class="text-danger">{{ $message }}</spastrong>
                      @enderror
                  </div>
                  </div>
                </div>
                <div class="card mt-3">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap gap-2">
                      <h6 class="mb-0 d-flex align-items-center gap-1"><i class="icon-settings fa-solid fa-globe"></i> Website</h6>
                      <input type="text" class="form-control @error('website_link') is-invalid @enderror" name="website_link" wire:model="website_link">
                      @error('about')
                        <div class="row d-flex justify-content-center">
                            <strong class="text-danger">{{ $message }}</strong>
                        </div>
                    @enderror
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap gap-2">
                      <h6 class="mb-0 d-flex align-items-center gap-1"><i class="icon-settings fa-brands fa-github"></i> Github</h6>
                      <input type="text" class="form-control @error('github_link') is-invalid @enderror" name="github_link" wire:model="github_link">
                        @error('github_link')
                            <div class="row d-flex justify-content-center">
                                <strong class="text-danger">{{ $message }}</strong>
                            </div>
                        @enderror
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap gap-2">
                      <h6 class="mb-0 d-flex align-items-center gap-1"><i class="icon-settings fa-brands fa-youtube"></i> YouTube</h6>
                      <input type="text" class="form-control @error('youtube_link') is-invalid @enderror" name="youtube_link" wire:model="youtube_link">
                        @error('youtube_link')
                            <div class="row d-flex justify-content-center">
                                <strong class="text-danger">{{ $message }}</strong>
                            </div>
                        @enderror
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap gap-2">
                      <h6 class="mb-0 d-flex align-items-center gap-1"><i class="icon-settings fa-brands fa-instagram"></i> Instagram</h6>
                      <input type="text" class="form-control @error('instagram_link') is-invalid @enderror" name="instagram_link" wire:model="instagram_link">
                        @error('instagram_link')
                            <div class="row d-flex justify-content-center">
                                <strong class="text-danger">{{ $message }}</strong>
                            </div>
                        @enderror
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap gap-2">
                      <h6 class="mb-0 d-flex align-items-center gap-1"><i class="icon-settings fa-brands fa-facebook"></i> Facebook</h6>
                      <input type="text" class="form-control @error('facebook_link') is-invalid @enderror" name="facebook_link" wire:model="facebook_link">
                        @error('facebook_link')
                            <div class="row d-flex justify-content-center">
                                <strong class="text-danger">{{ $message }}</strong>
                            </div>
                        @enderror
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row text-center mb-3">
                          <strong class="h3">Personal Informations</strong>
                      </div>
                      <div class="row d-flex align-items-center">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" value="{{ $user->name }}" wire:model="name" required>
                            @error('name')
                                <div class="row d-flex justify-content-center">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                      </div>
                      <hr>
                      <div class="row d-flex align-items-center">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Surname</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                              <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" id="" wire:model="surname" required>
                              @error('surname')
                                <div class="row d-flex justify-content-center">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </div>
                            @enderror
                          </div>
                      </div>
                      <hr>
                      <div class="row d-flex align-items-center">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          {{ $user->email }}
                        </div>
                      </div>
                      <hr>
                      <div class="row d-flex align-items-center">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"  wire:model="phone_number">
                            @error('phone_number')
                                <div class="row d-flex justify-content-center">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                      </div>
                      <hr>
                      <div class="row d-flex align-items-center">
                        <div class="col-sm-3">
                          <h6 class="mb-2">Location</h6>
                        </div>
                        <div class="col-sm-9 text-secondary d-flex flex-column gap-2">
                            <label for="countryList_">Country:</label>
                            <select name="country" class="form-select mb-2" id="countryList_" wire:model="country_id">
                                <option value="" selected>Select Country</option>
                                    @if (!is_null($user->country))
                                        <option value="{{ $user->country->id }}" selected>{{ $user->country->name }}</option>
                                    @endif
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                            </select>
                        
                                <label for="stateList_">State:</label>
                            <select name="state" class="form-select mb-2" id="stateList_" wire:model="state_id">
                                    @if (!is_null($user->state))
                                        <option value="{{ $user->state->id }}" selected>{{ $user->state->name }}</option>
                                    @endif
                            </select>
                        
                                <label for="cityList_">City:</label>
                            <select name="city"class="form-select mb-2" id="cityList_" wire:model="city_id">
                                    @if (!is_null($user->city))
                                        <option value="{{ $user->city->id }}" >{{ $user->city->name }}</option>
                                    @endif
                            </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card mb-3">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">About</h6>
                              </div>
                              <div class="col-sm-9 text-secondary d-flex flex-column align-items-end position-relative">
                                <textarea class="form-control about-bio @error('about') is-invalid @enderror" name="about" id="" cols="30" rows="10" maxlength="10000" wire:model="about"></textarea>
                                @error('about')
                                    <div class="row d-flex justify-content-center">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </div>
                                @enderror
                                <div class="length-counter">
                                    <span class="words">0</span>/1000
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="row m-0">
                    <button type="submit" class="btn btn-primary">Save</button>
              </div>
          </div>
      </div>
  </form>