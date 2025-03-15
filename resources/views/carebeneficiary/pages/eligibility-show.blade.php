@extends('carebeneficiary.layouts.app')

@section('title', 'Care Beneficiary - Eligibility Form')


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
      <link rel="stylesheet" type="text/css" href="/dashboard-assets/css/vendors/prism.css">
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
        <script src="/dashboard-assets/js/prism/prism.min.js"></script>
        <script src="/dashboard-assets/js/clipboard/clipboard.min.js"></script>
        <script src="/dashboard-assets/js/custom-card/custom-card.js"></script>
        <!-- calendar js-->
        <script src="/dashboard-assets/js/typeahead/handlebars.js"></script>
        <script src="/dashboard-assets/js/typeahead/typeahead.bundle.js"></script>
        <script src="/dashboard-assets/js/typeahead/typeahead.custom.js"></script>
        <script src="/dashboard-assets/js/typeahead-search/handlebars.js"></script>
        <script src="/dashboard-assets/js/typeahead-search/typeahead-custom.js"></script>
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="/dashboard-assets/js/script.js"></script>
        <script src="/dashboard-assets/js/script1.js"></script>
        <script src="/dashboard-assets/js/theme-customizer/customizer.js"></script>
        <!-- Plugin used-->


 
            
@endpush


@section('page-header')
<h4 class="f-w-700">Eligibility Request</h4>
<nav>
    <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('carebeneficiary.dashboard') }}"><i data-feather="home"></i></a></li>
        <li class="breadcrumb-item f-w-400">Dashboard</li>
        <li class="breadcrumb-item f-w-400">Eligibility</li>
    </ol>
</nav>
@endsection


@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Eligibility Request for {{ ucwords(Auth::user()->first_name) }}</h4>
                    </div>
                    <div class="card-body text-center">
                        <div id="responseAlert" class="d-none alert alert-light-danger light alert-dismissible fade show txt-danger border-left-danger mb-5" role="alert">
                        </div>

 

                        <!-- Display messages based on response count -->
                        <div id="messageSection" class="mb-4">
                            @if($carebeneficiary_eligibility == null) 
                            
                                @if($responses->count() == 0)
                                    <p class="lead">
                                        We are about to collect some information to assess your eligibility for our care services. 
                                        This data will help us tailor the best possible care plan for you. 
                                        For more details on how we handle your data, 
                                        please visit our 
                                        <a href="{{ route('mainsite.privacy') }}" target="_blank">Privacy Policy</a>.
                                    </p>
                                    <button class="btn btn-outline-primary" onclick="startForm()">Start Eligibility Form</button>
                                
                                    @elseif($responses->count() > 0)
                                        <div class="me-4">
                                            <i class="fa fa-question-circle text-warning fa-5x"></i>
                                        </div>       
                                        <p class="lead text-secondary fs-4">
                                            Your Eligibility Request form has been partially completed, and previous responses have been saved.
                                            You can continue answering the remaining questions or change any previously provided answers to proceed with booking care services.
                                        </p>
                                        
                                        <button class="btn btn-outline-primary" onclick="startForm()">Continue Eligibility Form</button>
                                    @endif
                                    
                            @else 
                            
                                @if($carebeneficiary_eligibility->status == 'eligible')
                                <div class="me-4">
                                    <i class="fa fa-check-circle text-success fa-5x"></i>
                                </div>
                                    <p class="lead fs-4">
                                        Congratulations! You are eligible for our care services. If you believe your eligibility status has changed and you need to redo the eligibility form, kindly 
                                        <a href="{{ route('mainsite.contact') }}" class="fw-bold fs-4" target="_blank">contact us</a>.
                                    </p>
                                    <p class="lead fs-4">
                                        You can now start booking for care!
                                    </p>
                                    <a href="{{ route('carebeneficiary.bookings.create') }}"   class="btn btn-primary mt-5">Book Care Now</a>

                                @elseif($carebeneficiary_eligibility->status == 'not_eligible')
                                    <div class="me-4">
                                        <i class="fa fa-exclamation-circle text-danger fa-5x"></i>
                                    </div>
                                    <p class="lead text-danger fs-4">
                                        Unfortunately, you are not eligible for our care services at this time. If you believe something is not right and you need to speak to us, kindly 
                                        <a href="{{ route('mainsite.contact') }}" target="_blank" class="fw-bold fs-4">contact us</a>.
                                    </p>
                                
                            
                                @elseif($carebeneficiary_eligibility->status == 'pending')
                                <p class="lead fs-4">

                                    The eligibility form for your care services has been successfully completed.
                                    submitted by 
                                    @if($carebeneficiary_eligibility->submittedBy->id == Auth::id())
                                        you
                                    @else
                                        {{ $carebeneficiary_eligibility->submittedBy->first_name }} (Family member)
                                    @endif
                                    please wait while we review the responses and provide feedback.
                                    
                                    <br/>
                                    <hr/>
                                    <button class="btn btn-outline-primary" onclick="window.location.href='{{ route('carebeneficiary.dashboard') }}'">Dashboard</button>
                                </p>
                                
                                
                                @endif
                            
                            @endif
                        
                        </div>


                        @if($carebeneficiary_eligibility == null)
                            <!-- Eligibility Form (Hidden until start button is clicked) -->
                            <div id="formContainer" style="display:none;">
                                <div class="progress mb-4">
                                    <div class="progress-bar progress-bar-striped bg-info" id="progressBar" style="width: 0%;"></div>
                                </div>

                                @foreach($questions as $index => $question)
                                    <form id="eligibility-form" class="optionsForm">
                                        <div class="question-step" data-step="{{ $index }}" style="{{ $index == 0 ? '' : 'display:none;' }}">
                                            <div class="card shadow-lg mb-4 border-0" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7); border-radius: 0;">
                                                <div class="card-body">
                                                    <!-- Question -->
                                                    <h4 class="card-title fw-bold">{{ $question->question }}</h4>
                                                    <!-- More Details (if available) -->
                                                    @if (!empty($question->more_details))
                                                        <p class="text-muted mt-2">{{ $question->more_details }}</p>
                                                    @endif
                                                    <span class="badge bg-primary mt-2 mb-2">{{ $loop->iteration }} / {{ count($questions) }}</span>
                                                </div>
                                            </div>
                                            
                                            <input type="hidden" name="question_id" value="{{ $question->id }}">
                                            @php $response = $responses[$question->id]->answer ?? null; @endphp

                                            <!-- Textarea -->
                                            @if($question->type === 'textarea')
                                                <div class="card-wrapper border rounded-3 checkbox-checked">
                                                    <textarea name="answer" placeholder="Enter your response here..." class="form-control">{{ $response }}</textarea>
                                                </div>
                                            <!-- Radio -->
                                            @elseif($question->type === 'radio')
                                                <div class="btn-group-vertical w-100" role="group">
                                                    @if(!empty($question->options) && is_array(json_decode($question->options, true)))
                                                        @foreach(json_decode($question->options) as $optionIndex => $option)
                                                            @php $uniqueId = 'option_' . $question->id . '_' . $optionIndex; @endphp
                                                            <input class="btn-check option-radio" id="{{ $uniqueId }}" type="radio" name="answer" 
                                                                value="{{ $option }}" @if(isset($response) && $response == $option) checked @endif>
                                                            <label class="btn btn-outline-info mb-2 text-start" for="{{ $uniqueId }}">
                                                                {{ $option }}
                                                            </label>
                                                        @endforeach

                                                        @if($question->option_others === 1)
                                                            @php
                                                            $options = json_decode($question->options, true); // Decode JSON to array
                                                            $isOtherSelected = isset($response) && (!is_array($options) || !in_array($response, $options));
                                                            @endphp

                                                            <input class="btn-check option-radio other-radio" id="radio_{{ $uniqueId }}" type="radio" name="answer" 
                                                            value="others" @if($isOtherSelected) checked @endif>
                                                            <label class="btn btn-outline-info mb-2 text-start" for="radio_{{ $uniqueId }}">
                                                            Others
                                                            </label>

                                                            <!-- Text box for "Other" option (hidden initially) -->
                                                            <div class="mb-3 w-100  @if(!$isOtherSelected) d-none @endif otherTextContainer">
                                                                <textarea  name="answer_other" id="otherText_{{ $uniqueId }}"  class="w-100 form-control otherText" 
                                                                placeholder="Enter your response here..."> @if($isOtherSelected) {{ $response }} @endif </textarea>
                                                            </div>                                               
                                                        @endif
                                                    @else
                                                        <div class="p-3 border border-danger text-danger rounded bg-white w-100">
                                                            <i class="fa fa-exclamation-triangle me-2 text-danger"></i>
                                                            <span>Error: Question options not found for Radio Button.</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            <!-- Checkbox -->
                                            @elseif($question->type === 'checkbox')
                                                @php 
                                                    $selectedOptions = json_decode($response) ?? []; 
                                                @endphp
                                                <div class="d-flex flex-column align-items-start">  
                                                    @if(!empty($question->options) && is_array(json_decode($question->options, true)))
                                                        @foreach(json_decode($question->options) as $index => $option)
                                                            @php 
                                                                $uniqueIdx = 'checkbox_' . $question->id . '_' . $index; 
                                                                $randomColor = $colorClasses[array_rand($colorClasses)];
                                                            @endphp

                                                            <div class="form-check checkbox checkbox-{{ $randomColor }} mb-2">
                                                                <input class="form-check-input" id="checkbox_{{ $uniqueIdx }}" type="checkbox" name="answer[]" value="{{ $option }}"
                                                                    @if(in_array($option, $selectedOptions)) checked @endif>
                                                                <label class="form-check-label" for="checkbox_{{ $uniqueIdx }}"> {{ $option }} </label>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="p-3 border border-danger text-danger rounded bg-white w-100">
                                                            <i class="fa fa-exclamation-triangle me-2 text-danger"></i>
                                                            <span>Error: Question options not found not found for Checkbox.</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif

                                            <!-- Child Question -->
                                            @if ($question->child_question)
                                                <div class="mt-5">
                                                    <div class="card-wrapper border rounded-3 checkbox-checked">
                                                        <h4 class="card-title fw-bold">{{ $question->child_question }}</h4>
                                                        <hr/>
                                                        <textarea name="child_answer" id="child_answer_{{ $question->id }}" class="form-control" placeholder="Enter your response here...">{{ $responses[$question->id]->child_answer ?? '' }}</textarea>
                                                    </div>                                           
                                                </div>
                                            @endif

                                            <br>
                                            <div class="mt-3">
                                                @if($index > 0)
                                                    <button type="button" class="btn btn-outline-secondary prev"><i class="fa fa-arrow-left me-2"></i> Previous</button>
                                                @endif
                                                <button type="button" class="btn btn-primary next"><i class="fa fa-arrow-right me-2"></i> {{ $index == count($questions) - 1 ? 'Submit' : 'Next' }}</button>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                        @endif


 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function startForm() {
        document.getElementById('messageSection').style.display = 'none';
        document.getElementById('formContainer').style.display = 'block';
    }

    $(document).ready(function () {

        // Set CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
 

        let step = 0;
        let totalSteps = $(".question-step").length;

        function updateProgress() {
            let percent = ((step + 1) / totalSteps) * 100;
            $("#progressBar").css("width", percent + "%").attr("aria-valuenow", percent);
        }

        $(".next").click(function () {
            let form = $(".question-step[data-step='" + step + "']");
            let formData = form.find("input, textarea").serialize();
            const alertBox = $('#responseAlert');

            $.post("{{ route('carebeneficiary.eligibility.save') }}", formData, function (response) {
 
                if (response.success) {
                    alertBox.addClass('d-none').text('Form saved successfully!');

                    form.hide();
                    step++;
                    if (step < totalSteps) {
                        $(".question-step[data-step='" + step + "']").show();
                        updateProgress();
                    } else {
                        alertBox.text('Form completed successfully! Redirecting...');
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    }
                } else {
                    alertBox.removeClass('d-none alert-success').addClass('alert-danger').text(response.message);
                }
            }).fail(function (xhr) {
                const alertBox = $('#responseAlert');
                let errorMessage = xhr.responseJSON?.message || 'An error occurred while saving the response.';

                alertBox.removeClass('d-none').text(errorMessage);
            });

            
        });

        $(".prev").click(function () {
            $(".question-step[data-step='" + step + "']").hide();
            step--;
            $(".question-step[data-step='" + step + "']").show();
            updateProgress();
        });

        updateProgress();
    });
</script>

 
<script>
    $(document).ready(function () {
    // Handle "Other" option selection dynamically per question form
    $(document).on("change", ".option-radio", function () {
        let stepContainer = $(this).closest(".question-step");
        let otherTextContainer = stepContainer.find(".otherTextContainer");
        let otherTextInput = stepContainer.find(".otherText");

        if ($(this).hasClass("other-radio")) {
            otherTextContainer.removeClass("d-none");
            otherTextInput.prop("required", true);
        } else {
            otherTextContainer.addClass("d-none");
            otherTextInput.prop("required", false).val("");
        }
    });

    // Prevent selecting both a radio option and "Other" text input
    $(document).on("input", ".otherText", function () {
        let stepContainer = $(this).closest(".question-step");
        stepContainer.find(".option-radio").prop("checked", false);
        stepContainer.find(".other-radio").prop("checked", true);
    });

});
</script>

@endpush
