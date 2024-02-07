<div class="container" wire:poll="refreshMessages">
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Recent</h4>
                    </div>
                    <div class="srch_bar">
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control search-bar" placeholder="Search">
                            <span class="input-group-text">
                                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="inbox_chat">
                    @foreach ($chats as $chat)
                        <div class="chat_list {{ $chat->id == $activeChat->id ? 'active_chat' : '' }}" wire:click="navigationChatClicked('{{ $chat->id }}')">
                            <div class="chat_people">
                                <div class="chat_img">
                                     {{-- @if (!is_null($chat->chats->user->profile_image_path))
                                            <img class="user-profile-image" src="{{ asset('storage/'. $user->profile_image_path) }}" alt="{{ $user->name }} {{ $user->surname }}">
                                        @else
                                            <img class="user-profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $user->name }} {{ $user->surname }}">
                                    @endif --}}
                                </div>
                                <div class="chat_ib">
                                    <h5 class="{{ $chat->id == $activeChat->id ? 'text-primary fw-bold' : '' }}">
                                        @if ($chat->isGroupChat())
                                            <!-- Is group chat -->
                                            {{ $chat->name }}
                                        @else
                                            <!-- Is not group chat -->
                                            @foreach ($chat->users()->where('users.id', '<>', Auth::user()->id)->get() as $user)
                                                {{ $user->name }}
                                                {{ $user->surname }}
                                            @endforeach
                                        @endif
                                         <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions 
                                        astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mesgs">
                <div class="msg_history">
                    @foreach ($activeChat->messages()->orderBy('created_at', 'ASC')->get() as $message)
                        @if ($message->isAuthenticatedUsers())
                            <div class="outgoing_msg">
                                <div class="sent_msg">
                                    <p>{{ $message->message }}</p>
                                    <span class="time_date">{{ $message->getReadableCreatedAt() }}</span>
                                </div>
                            </div>
                            @else
                            <div class="incoming_msg">
                                <div class="incoming_msg_img">
                                         @if (!is_null($message->user->profile_image_path))
                                                <img class="rounded-circle" src="{{ asset('storage/'. $message->user->profile_image_path) }}" alt="{{ $message->user->name }} {{ $message->user->surname }}">
                                            @else
                                                <img class="rounded-circle" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $message->user->name }} {{ $message->user->surname }}">
                                        @endif
                                </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>{{ $message->message }}</p>
                                        <span class="time_date">{{ $message->getReadableCreatedAt() }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="type_msg">
                    <form wire:submit.prevent="sendMessage">
                        <div class="input_msg_write">
                            <input type="text" class="form-control write_msg" placeholder="Type a message" wire:model="message">
                            <button class="btn btn-primary" type="submit"><i class="fa-regular fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>