<div>
    <div class="modal fade" id="status-modal-{{ $userId }}" tabindex="-1" role="dialog" aria-labelledby="info-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userStatus">User Status</h5>
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

                    <p>Full name: {{ $user->name }} {{ $user->surname }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <p>Role: <strong>{{ $user->role }}</strong></p>

                    <hr>

                    @if ($user->isBanned())
                        <h5 class="text-danger"><strong>This user is Banned</strong></h5>
                        <p>Category: {{ $user->bans->first()->category ?? 'Unknown'}}</p>
                        <p>Reason: {{ $user->bans->first()->reason ?? 'Unknown' }}</p>

                        @livewire('admin.unban-button', [$user->id])

                        @else
                            @livewire('admin.ban-form', [
                                'userId' => $user->id
                            ])
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Dodajmy skrypt JavaScript, który będzie słuchał zdarzenia Livewire i zamykał modal po jego zakończeniu
    document.addEventListener("livewire:load", function () {
      Livewire.hook('message.processed', (message, component) => {
        if (message.updateQueue[0].method === 'submitFormAndCloseModal') {
          // Zamknij modal po zakończeniu wysyłania formularza
          $('#myModal').modal('hide');
        }
      });
    });
  </script>