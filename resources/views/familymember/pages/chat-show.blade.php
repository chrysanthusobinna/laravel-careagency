@extends('familymember.layouts.app')

@section('title', 'Family Member - Chat')


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
 
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

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
 
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <script>
        var pusher = new Pusher('ed7a3a867a73393c5b43', {
            cluster: 'eu'
        });
    
        var channel = pusher.subscribe('chat.{{ $chat->id }}');
        
        // Function to append message or attachment
        function appendMessageOrAttachment(data, type) {
            if (data.sender) {
                var senderId = data.sender_id;
                var senderName = data.sender.first_name;
                var createdAt = data.created_at;
                var chatMessages = document.querySelector('.msger-chat');
    
                // Create the message bubble for the new message
                var newMessage = document.createElement('div');
                newMessage.classList.add('msg');
                newMessage.classList.add(senderId === {{ Auth::id() }} ? 'right-msg' : 'left-msg');
    
                var msgBubble = document.createElement('div');
                msgBubble.classList.add('msg-bubble');
    
                var msgInfo = document.createElement('div');
                msgInfo.classList.add('msg-info');
    
                var msgInfoName = document.createElement('div');
                msgInfoName.classList.add('msg-info-name');
                msgInfoName.textContent = senderName;
    
                var msgInfoTime = document.createElement('div');
                msgInfoTime.classList.add('msg-info-time');
                msgInfoTime.textContent = createdAt;
    
                msgInfo.appendChild(msgInfoName);
                msgInfo.appendChild(msgInfoTime);
                msgBubble.appendChild(msgInfo);
    
                // Check if the event type is 'message' or 'attachment'
                if (type === 'message') {
                    var messageContent = data.message;
                    var msgText = document.createElement('div');
                    msgText.classList.add('msg-text');
                    msgText.textContent = messageContent;
                    msgBubble.appendChild(msgText);
                } else if (type === 'attachment') {
                    var attachment = data.attachment;
                    var attachmentElement;
                    var fileExtension = attachment.split('.').pop().toLowerCase();
    
                    // Handle image attachments
                    if (['png', 'jpeg', 'jpg'].includes(fileExtension)) {
                        attachmentElement = document.createElement('img');
                        attachmentElement.src = '{{ asset('storage/') }}/' + attachment;
                        attachmentElement.classList.add('img-fluid', 'w-50', 'mx-auto', 'd-block');
    
                        // Create Download Button for Image
                        var downloadBtn = document.createElement('a');
                        downloadBtn.href = '{{ asset('storage/') }}/' + attachment;
                        downloadBtn.classList.add('w-100', 'btn-sm', 'btn-block', 'btn', 'btn-square', 'mx-auto', 'mt-2');
                        downloadBtn.style = "background-color: #f0f8ff; color: #333; border: 1px solid #ddd; padding: 10px 20px;";
                        downloadBtn.setAttribute('download', '');
                        downloadBtn.innerHTML = `<i class="fa fa-download"></i> Download Image`;
    
                        msgBubble.appendChild(attachmentElement);
                        msgBubble.appendChild(downloadBtn);
                    } 
                    // Handle video attachments
                    else if (fileExtension === 'mp4') {
                        attachmentElement = document.createElement('video');
                        attachmentElement.controls = true;
                        var source = document.createElement('source');
                        source.src = '{{ asset('storage/') }}/' + attachment;
                        source.type = 'video/mp4';
                        attachmentElement.appendChild(source);
    
                        // Create Download Button for Video
                        var downloadBtn = document.createElement('a');
                        downloadBtn.href = '{{ asset('storage/') }}/' + attachment;
                        downloadBtn.classList.add('w-100', 'btn-sm', 'btn-block', 'btn', 'btn-square', 'mx-auto', 'mt-2');
                        downloadBtn.style = "background-color: #f0f8ff; color: #333; border: 1px solid #ddd; padding: 10px 20px;";
                        downloadBtn.setAttribute('download', '');
                        downloadBtn.innerHTML = `<i class="fas fa-download"></i> Download Video`;
    
                        msgBubble.appendChild(attachmentElement);
                        msgBubble.appendChild(downloadBtn);
                    }
                }
    
                newMessage.appendChild(msgBubble);
                chatMessages.appendChild(newMessage);
    
                // Scroll to the latest message
                chatMessages.scrollTop = chatMessages.scrollHeight;
            } else {
                //console.error("Sender data is missing in the event.");
            }
        }



        // Function to update unseen messages
        function updateUnseenMessages() {
            $.ajax({
                url: '/familymember/chat/update-unseen-messages/{{ $chat->id }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                     // Handle success 
                },
                error: function(error) {
                    // Handle error 
                    console.error('Error updating unseen messages:', error);
                }
            });
        }


        // Bind events
        channel.bind('message.sent', function(data) {
            appendMessageOrAttachment(data, 'message');
            updateUnseenMessages();
        });

        channel.bind('attachment.sent', function(data) {
            appendMessageOrAttachment(data, 'attachment');
            updateUnseenMessages();
        });

        
        
    </script>
    

    <script>
        $('#send-message-form').on('submit', function(e) {
            e.preventDefault(); 
            

            var message = $('input[name="message"]').val(); 
            var chatId = '{{ $chat->id }}'; 
            $('input[name="message"]').val('');
            
            $.ajax({
                url: '{{ route('familymember.message.send', $chat->id) }}',
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
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'There was an error sending the message.',
                        confirmButtonText: 'Try Again'
                        });
                }
            });
        });
    </script>


    <script>
        $('#send-attachment-form').on('submit', function(e) {
            e.preventDefault();
            $('#fileUploadModal').modal('hide');
            
            var formData = new FormData(this); // Collect all form data including the file
            
            var chatId = '{{ $chat->id }}'; 
            formData.append('chat_id', chatId); 
            
            $.ajax({
                url: '{{ route('familymember.chat.attachment.send', $chat->id) }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false, 
                success: function(response) {
                    $('#send-attachment-form')[0].reset();
                    //console.log(response);
                    
                },
                error: function(error) {
                    
                    $('#send-attachment-form')[0].reset();
                        Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'There was an error sending the attachment.',
                        confirmButtonText: 'Try Again'
                        });
                }
            });
        });
    </script>


    <script>
    $(document).ready(function() {
        var chatMessages = $('.msger-chat');
        chatMessages.scrollTop(chatMessages[0].scrollHeight);
    });

  </script>

@endpush


@section('page-header')
    <h4 class="f-w-700">Chat</h4>
    <nav>
        <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('familymember.dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item f-w-400">Dashboard</li>
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

                         <a href="{{ route('familymember.dashboard') }}" class="btn btn-outline-primary" data-toggle="modal" data-target="#userSearchModal">
                            <i class="fa fa-home"></i> Dashboard
                        </a>

                        
                        <button type="button" class="btn btn-outline-primary" onclick="window.location='{{ route('familymember.chat.index') }}'">
                            <i class="fa fa-comment"></i> Chat List
                        </button>
                        
                    </div>
                </div>
                
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
                                        <a class="dropdown-item" href="#ChatPaticpantsModal" data-bs-toggle="modal">Chat Participants</a>
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
                                        
                                        <!-- Check if message is not null and attachment is null -->
                                        @if($message->message && !$message->attachment)
                                            <div class="msg-text">{{ $message->message }}</div>
                                        @elseif(!$message->message && $message->attachment)
                                            <!-- If message is null and attachment exists, display the image or video attachment -->
                                            @if (in_array(pathinfo($message->attachment, PATHINFO_EXTENSION), ['png', 'jpeg', 'jpg']))
                                                <img src="{{ asset('storage/' . $message->attachment) }}" alt="attachment" class="img-fluid w-50 mx-auto d-block" />
                                                <!-- Add Download Button -->
                                                <a href="{{ asset('storage/' . $message->attachment) }}" class="w-100 btn-sm btn-block btn btn-square mx-auto mt-2" style="background-color: #f0f8ff; color: #333; border: 1px solid #ddd; padding: 10px 20px;" download>
                                                    <i class="fa fa-download"></i> Download Image
                                                </a>
                                                
                                            @elseif(pathinfo($message->attachment, PATHINFO_EXTENSION) == 'mp4')
                                                <video controls class="w-100">
                                                    <source src="{{ asset('storage/' . $message->attachment) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                                <!-- Add Download Button for Video -->
                                                <a href="{{ asset('storage/' . $message->attachment) }}"  class="w-100 btn-sm btn-block btn btn-square mx-auto mt-2" style="background-color: #f0f8ff; color: #333; border: 1px solid #ddd; padding: 10px 20px;" download>
                                                    <i class="fas fa-download"></i> Download Video
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            
                            
                            </div>

                            <form id="send-message-form" class="msger-inputarea">
                                @csrf
                                <!-- Trigger Button -->
                                <div class="dropdown-form dropdown-toggle" role="main" data-bs-toggle="modal" data-bs-target="#fileUploadModal" aria-expanded="false">
                                    <i class="icon-plus"></i>
                                </div>

                                <input class="msger-input two uk-textarea" type="text" name="message" placeholder="Type Message here..." required autocomplete="off">
                                <div class="open-emoji">
                                    <div class="second-btn uk-button"></div>
                                  </div>
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
 


 

<!-- Modal Structure -->
<div class="modal fade" id="ChatPaticpantsModal" tabindex="-1" aria-labelledby="ChatPaticpantsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ChatPaticpantsModalLabel">Chat Participants</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Table for Chat Participants -->
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
                                            <h6>{{ $user->first_name . " " . ($user->middle_name ? $user->middle_name . " " : '') . $user->last_name }}</h6>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



 



<!-- Modal for File Upload -->
<div class="modal fade" id="fileUploadModal" tabindex="-1" aria-labelledby="fileUploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileUploadModalLabel">Send Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="send-attachment-form" enctype="multipart/form-data">
                    <!-- Image File Input -->
                    <div class="mb-3">
                        <label for="imageUpload" class="form-label">Select Photo</label>
                        <input type="file" class="form-control" id="imageUpload" name="attachment" required accept="image/*">
                    </div>
                    @csrf
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" form="send-attachment-form">Send</button>

            </div>            
        </div>
    </div>
</div>



@endsection

