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
            </div>
        </div>
    </div>
</div>