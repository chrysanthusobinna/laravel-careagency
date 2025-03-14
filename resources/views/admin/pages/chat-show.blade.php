@extends('admin.layouts.app')

@section('title', 'Admin - Chat')


@push('styles')


    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/animate.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/style.css">
    <link id="color" rel="stylesheet" href="/dashboard-assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/responsive.css">
	

    
@endpush


@push('scripts')

    <!-- latest jquery-->
    <script src="/dashboard-assets/js/jquery.min.js"></script>
    <!-- Bootstrap js-->
    <script src="/dashboard-assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="/dashboard-assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="/dashboard-assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="/dashboard-assets/js/scrollbar/simplebar.js"></script>
    <script src="/dashboard-assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="/dashboard-assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="/dashboard-assets/js/sidebar-menu.js"></script>
    <script src="/dashboard-assets/js/sidebar-pin.js"></script>
    <script src="/dashboard-assets/js/slick/slick.min.js"></script>
    <script src="/dashboard-assets/js/slick/slick.js"></script>
    <script src="/dashboard-assets/js/header-slick.js"></script>
    <!-- calendar js-->
    {{-- <script src="/dashboard-assets/js/common-chat.js"></script> --}}
    <script src="/dashboard-assets/js/emoji-js/uikit.min.js"></script>
    <script src="/dashboard-assets/js/emoji-js/custom-emoji.js"></script>
    <script src="/dashboard-assets/js/emoji-js/custom-emojis.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="/dashboard-assets/js/script.js"></script>
    <script src="/dashboard-assets/js/script1.js"></script>
    <script src="/dashboard-assets/js/theme-customizer/customizer.js"></script>
    <!-- Plugin used-->
 
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <script>
      
        var pusher = new Pusher('ed7a3a867a73393c5b43', {
          cluster: 'eu'
        });
      
        var channel = pusher.subscribe('chat.{{ $chat->id }}');
        channel.bind('message.sent', function(data) {
          if (data.sender) {
            var message = data.message;
            var senderId = data.sender_id;
            var senderName = data.sender.first_name;
            var messageContent = data.message;
            var createdAt = data.created_at;
      
            var chatMessages = document.querySelector('.msger-chat');
      
            var newMessage = `
              <div class="msg ${senderId === {{ Auth::id() }} ? 'right-msg' : 'left-msg'}">
                <div class="msg-bubble">
                  <div class="msg-info">
                    <div class="msg-info-name">${senderName}</div>
                    <div class="msg-info-time">${createdAt}</div>
                  </div>
                  <div class="msg-text">${messageContent}</div>
                </div>
              </div>
            `;
      
            chatMessages.innerHTML += newMessage;
      
            chatMessages.scrollTop = chatMessages.scrollHeight;
          } else {
            console.error("Sender data is missing in the event.");
          }
        });
      </script>
      
      <script>
        $(document).ready(function() {
            var chatMessages = $('.msger-chat');
            chatMessages.scrollTop(chatMessages[0].scrollHeight);
        });

      </script>


    <script>
        $('#send-message-form').on('submit', function(e) {
            e.preventDefault(); 

            var message = $('input[name="message"]').val(); 
            var chatId = '{{ $chat->id }}'; 

            $.ajax({
                url: '{{ route('admin.message.send', $chat->id) }}',
                method: 'POST',
                data: {
                    message: message,
                    chat_id: chatId,
                    _token: $('input[name="_token"]').val()
                },
                success: function(response) {
                    $('input[name="message"]').val('');
                },
                error: function(error) {
                    alert('There was an error sending the message.');
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            // Filter users based on the search input
            $('#searchInput').on('keyup', function() {
                var query = $(this).val().toLowerCase();
                $('.user-item').each(function() {
                    var name = $(this).text().toLowerCase();
                    if (name.indexOf(query) !== -1) {
                        $(this).show();  // Show matching users
                    } else {
                        $(this).hide();  // Hide non-matching users
                    }
                });
            });

            // Handle the form submission to start the chat
            $('#startChatButton').on('click', function() {
                var selectedUsers = [];
                $('input[name="user_ids[]"]:checked').each(function() {
                    selectedUsers.push($(this).val());
                });

                if (selectedUsers.length === 0) {
                    alert("Please select at least one user to start the chat.");
                    return;
                }

                // Submit the selected users using AJAX or form submission
                $.ajax({
                    url: '{{ route('admin.chat.store') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        user_ids: selectedUsers
                    },
                    success: function(response) {
                        // Redirect to the new chat page or handle response
                        window.location.href = response.redirect_url;
                    },
                    error: function() {
                        alert("Failed to create chat. Please try again.");
                    }
                });
            });
        });

    </script>


<script>
    $(document).ready(function() {
        // Initially hide the table content
        $('#chatParticipants').hide();  
         
        // Click event for toggling visibility
        $('#toggleButton').click(function() {
            $('#chatParticipants').slideToggle(); 
            $('#expandIcon').toggleClass('fa-plus fa-minus');
        });
    });
</script>


@endpush


@section('page-header')
    <h4 class="f-w-700">Chat</h4>
    <nav>
        <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item f-w-400">Admin Panel</li>
            <li class="breadcrumb-item f-w-400 active">Chat</li>
        </ol>
    </nav>
@endsection

 


@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 mx-auto">

                @include('partials._dashboard_message')


                <div class="card" style="background-color: rgba(255, 255, 255, 0.7); box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
                    <div class="card-body d-flex justify-content-between align-items-center">

                         <a href="{{ route('admin.chat.create') }}" class="btn btn-outline-primary" data-toggle="modal" data-target="#userSearchModal">
                            <i class="fa fa-plus"></i> New Chat
                        </a>

                        
                        <button type="button" class="btn btn-outline-primary" onclick="window.location='{{ route('admin.chat.index') }}'">
                            <i class="fa fa-arrow-left"></i> Go Back
                        </button>
                        
                    </div>
                </div>

                @if($chat->users->count() > 2)

                <div class="card border-3" style="border-top: 3px solid #007bff; border-radius: 0;">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Chat Participants</h5>
                        <!-- Expand/Collapse Button -->
                        <button class="btn btn-link" id="toggleButton">
                            <i class="fa fa-plus" id="expandIcon"></i>  
                        </button>
                    </div>
                    <div class="card-body" id="chatParticipants">
                        <table class="table table-bordered">
                            <tbody>
                                @foreach($chat->users as $user)
                                    @php
                                    $randomColor = $colorClasses[array_rand($colorClasses)];
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="flex-shrink-0">
                                                    @if($user->profile_picture == 'default.png')
                                                        <div class="letter-avatar">
                                                            <h6 class="txt-{{ $randomColor }} bg-light-{{ $randomColor }}">{{ $user->initials }}</h6>
                                                        </div>
                                                    @else
                                                        <img src="{{ asset('uploads/profile_pictures/' . $user->profile_picture) }}" alt="Profile Picture" class="img-fluid rounded-circle" width="40">
                                                    @endif
                                                </div>
                                                <div class="flex-grow-1">
                                                    <a href="
                                                        @if($user->role == 'admin_level_1' || $user->role == 'admin_level_2')
                                                            {{ route('admin.users.show', $user->id) }}
                                                        @elseif($user->role == 'care_giver')
                                                            {{ route('admin.caregivers.show', $user->id) }}
                                                        @elseif($user->role == 'care_beneficiary')
                                                            {{ route('admin.care-beneficiary.show', $user->id) }}
                                                        @elseif($user->role == 'family_member')
                                                            {{ route('admin.familymember.show', $user->id) }}
                                                        @else
                                                             #
                                                        @endif
                                                        ">
                                                        <h6>{{ $user->first_name . " " . ($user->middle_name ? $user->middle_name . " " : '') . $user->last_name }}</h6>
                                                    </a>
                                                
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            @if($user->role == 'admin_level_1')
                                                <span class="badge bg-danger">{{ $user->formatted_role }}</span>
                                            @elseif($user->role == 'admin_level_2')
                                                <span class="badge bg-warning">{{ $user->formatted_role }}</span>
                                            @elseif($user->role == 'care_giver')
                                                <span class="badge bg-success">{{ $user->formatted_role }}</span>
                                            @elseif($user->role == 'care_beneficiary')
                                                <span class="badge bg-primary">{{ $user->formatted_role }}</span>
                                            @elseif($user->role == 'family_member')
                                                <span class="badge bg-secondary">{{ $user->formatted_role }}</span>
                                            @else
                                                <span class="badge bg-info">{{ $user->formatted_role }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
 
                
                <div class="card right-sidebar-chat">
                    <div class="right-sidebar-title">
                        <div class="common-space"> 
                            <div class="chat-time group-chat">
                                <ul> 


                            {{-- group chat --}}
                            @if($chat->users->count() > 2)
                                <div class="custom-name profile-count bg-primary">
                                    <p class="f-w-500 text-white"><i class="fa fa-users"></i></p>
                                </div>
                            @else
                            <!-- For one-on-one chat -->
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
                            @endif
                                
                                </ul>
                                
                                <div>
                                    {{-- group chat --}}
                                    @if($chat->users->count() > 2)
                                        <span>{{ $chat->title }}</span>
                                        <p>(<em class="text-muted">You and {{ $chat->users->count()-1 }} others</em> )</p>
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
                                <div class="contact-edit chat-alert">
                                    <svg class="dropdown-toggle" role="menu" data-bs-toggle="dropdown" aria-expanded="false">
                                      <use href="/dashboard-assets/svg/icon-sprite.svg#menubar"></use>
                                    </svg>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('admin.chat.edit', ['chatId' => $chat->id]) }}">Update Chat</a>
                                        <a class="dropdown-item" href="#deleteChatModal" data-bs-toggle="modal">Delete Chat</a>
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



        
        
    </div>
    <!-- Container-fluid Ends-->
</div>
 







<!-- Modal for user search and selection -->
<div class="modal fade" id="userSearchModal" tabindex="-1" aria-labelledby="userSearchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userSearchModalLabel">Select Participants</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Search input -->
                <div class="form-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search for users...">
                </div>

                <!-- User list with radio buttons -->
                <div id="userList">
  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="startChatButton" class="btn btn-primary">Start Chat</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal Delete chat-->
<div class="modal fade" id="deleteChatModal" tabindex="-1" aria-labelledby="deleteChatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteChatModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this chat?</p>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <!-- Cancel button -->
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
  
                <form action="{{ route('admin.chat.delete', $chat->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <!-- Delete button -->
                    <button type="submit" class="btn btn-danger">Delete Chat</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

