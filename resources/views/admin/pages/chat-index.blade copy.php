<div class="row g-0 d-flex"> <!-- Added d-flex to enable Flexbox -->
    <div class="col-xxl-3 col-xl-4 col-md-5 box-col-5">
        <div class="left-sidebar-wrapper card h-100"> <!-- Added h-100 to make the card fill the height -->
            <div class="left-sidebar-chat">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="search-icon text-gray" data-feather="search"></i>
                    </span>
                    <input class="form-control" type="text" placeholder="Search here..">
                </div>
            </div>
            <div class="advance-options">
                <div class="tab-content" id="chat-options-tabContent">
                    <div class="tab-pane fade show active" id="chats" role="tabpanel" aria-labelledby="chats-tab">
                        <div class="common-space">
                            <p>Recent chats</p>
                            <div class="header-top">
                                <a class="btn badge-light-primary f-w-500" href="#!">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="chats-user">
                            <!-- Chat list items here -->
                            <li class="common-space">
                                <div class="chat-time">
                                    <div class="active-profile">
                                        <img class="img-fluid rounded-circle" src="../assets/images/avtar/3.jpg" alt="user">
                                        <div class="status bg-success"></div>
                                    </div>
                                    <div>
                                        <span>Cameron Williamson</span>
                                        <p>Hey, How are you?</p>
                                    </div>
                                </div>
                                <div>
                                    <p>2 min</p>
                                    <div class="badge badge-light-success">15</div>
                                </div>
                            </li>
                            <!-- Repeat other chat list items here -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-9 col-xl-8 col-md-7 box-col-7">
        <div class="card right-sidebar-chat h-100"> <!-- Added h-100 to make the card fill the height -->
            <div class="right-sidebar-title">
                <div class="common-space">
                    <div class="chat-time group-chat">
                        <ul>
                            @foreach ($chat->users->take(3) as $user)
                            <li>
                                @if($user->id == Auth::id())
                                <div class="custom-name profile-count bg-primary">
                                    <p class="f-w-500 text-white">{{ $user->initials }}</p>
                                </div>
                                @else
                                <div class="custom-name profile-count light-background">
                                    <p class="f-w-500">{{ $user->initials }}</p>
                                </div>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        <div>
                            @if($chat->users->count() > 2)
                            <span>{{ $chat->title }}</span>
                            <em class="text-muted">
                                @foreach($chat->users as $user)
                                {{ $user->first_name }} {{ $user->last_name }}{{ !$loop->last ? ',' : '' }}
                                @endforeach
                            </em>
                            @else
                            <!-- For one-on-one chat -->
                            @foreach($chat->users as $user)
                            @if($user->id !== Auth::id())
                            <span>{{ $user->first_name . " " . ($user->middle_name ? $user->middle_name . " " : '') . $user->last_name }}</span>
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <div class="contact-edit chat-alert"><i class="icon-info-alt"></i></div>
                        <div class="contact-edit chat-alert">
                            <svg class="dropdown-toggle" role="menu" data-bs-toggle="dropdown" aria-expanded="false">
                                <use href="/dashboard-assets/svg/icon-sprite.svg#menubar"></use>
                            </svg>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#!">View details</a>
                                <a class="dropdown-item" href="#!">Send messages</a>
                                <a class="dropdown-item" href="#!">Add to favorites</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-sidebar-Chats">
                <div class="msger">
                    <div class="msger-chat">
                        @foreach ($chat->messages as $message)
                        <div class="msg @if($message->sender_id == Auth::id()) right-msg @else left-msg @endif">
                            <div class="msg-bubble">
                                <div class="msg-info">
                                    <div class="msg-info-name">{{ $message->sender->first_name }}</div>
                                    <div class="msg-info-time">{{ $message->created_at->format('h:i A d M, Y') }}</div>
                                </div>
                                <div class="msg-text">{{ $message->message }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- AJAX form to send messages -->
                    <form id="send-message-form" class="msger-inputarea">
                        @csrf
                        <input class="msger-input two uk-textarea" type="text" name="message" placeholder="Type Message here..." required autocomplete="off">
                        <button class="msger-send-btn" type="submit"><i class="fa fa-location-arrow"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>