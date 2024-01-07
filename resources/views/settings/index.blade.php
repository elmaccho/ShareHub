@extends('layouts.app')
@section('title', $user->name . ' ' . $user->surname . ' Profile')
@section('content')  
<div class="container">
  @include('helpers.flash-messages')
    <form action="{{ route('settings.update', $user->id) }}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="main-body">    
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        @if (!is_null($user->profile_image_path))
                                <img class="rounded-circle" width="150" height="150" src="{{ asset('storage/'. $user->profile_image_path) }}" alt="{{ $user->name }} {{ $user->surname }}">
                            @else
                                <img class="rounded-circle" width="150" height="150" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $user->name }} {{ $user->surname }}">
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h6 class="mb-0 d-flex align-items-center gap-1"><i class="icon-settings fa-solid fa-globe"></i> Website</h6>
                        <input type="text" class="form-control" name="settings[website_link]" value="{{ $user->website_link }}">
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h6 class="mb-0 d-flex align-items-center gap-1"><i class="icon-settings fa-brands fa-github"></i> Github</h6>
                        <input type="text" class="form-control" name="settings[github_link]" value="{{ $user->github_link }}">
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h6 class="mb-0 d-flex align-items-center gap-1"><i class="icon-settings fa-brands fa-youtube"></i> YouTube</h6>
                        <input type="text" class="form-control" name="settings[youtube_link]" value="{{ $user->youtube_link }}">
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h6 class="mb-0 d-flex align-items-center gap-1"><i class="icon-settings fa-brands fa-instagram"></i> Instagram</h6>
                        <input type="text" class="form-control" name="settings[instagram_link]" value="{{ $user->instagram_link }}">
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h6 class="mb-0 d-flex align-items-center gap-1"><i class="icon-settings fa-brands fa-facebook"></i> Facebook</h6>
                        <input type="text" class="form-control" name="settings[facebook_link]" value="{{ $user->facebook_link }}">
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
                            <input type="text" class="form-control" name="settings[name]" id="" value="{{ $user->name }}" required>
                          </div>
                        </div>
                        <hr>
                        <div class="row d-flex align-items-center">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Surname</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="settings[surname]" id="" value="{{ $user->surname }}" required>
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
                            <input type="text" class="form-control" name="settings[phone_number]" id="" value="{{ $user->phone_number }}">
                          </div>
                        </div>
                        <hr>
                        <div class="row d-flex align-items-center">
                          <div class="col-sm-3">
                              <h6 class="mb-0">Address</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                              <input type="text" class="form-control @error('address') is-invalid @enderror" name="settings[address]" value="{{ $user->address }}" id="">
                              @error('settings.address')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
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
                                  <textarea class="form-control about-bio" name="settings[about]" id="" cols="30" rows="10" maxlength="1000">{{ $user->about }}</textarea>
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
</div>
@endsection
@vite('resources/css/settings.css')
@vite('resources/js/length_counter_about_bio.js')