@extends('serviceusers.layouts.app')

@section('title', 'Serviceuser - Eligibility Form')


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

      <style>
        .step { display: none; }
        .step.active { display: block; }
    </style>
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


 
   <script>
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
        
        $.post("{{ route('serviceuser.eligibility.care-beneficiary.save') }}", formData, function (response) {
            if (response.success) {
                form.hide();
                step++;
                if (step < totalSteps) {
                    $(".question-step[data-step='" + step + "']").show();
                    updateProgress();
                } else {
                    alert("Form completed successfully!");
                }
            } else {
                alert(response.message);
            }
        }).fail(function () {
            alert("Error saving response.");
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
        
            
@endpush


@section('page-header')
<h4 class="f-w-700">Eligibility Form</h4>
<nav>
    <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('serviceuser.dashboard') }}"><i data-feather="home"></i></a></li>
        <li class="breadcrumb-item f-w-400">Dashboard</li>
        <li class="breadcrumb-item f-w-400 active">Eligibility Form</li>
    </ol>
</nav>
@endsection


@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Eligibility Form</h4>
                    </div>
                    <div class="card-body text-center">
                        <div class="progress mb-4">
                            <div class="progress-bar" id="progressBar" style="width: 0%;"></div>
                        </div>
                    
 
                            @foreach($questions as $index => $question)

                            <form id="eligibility-form">
                                <div class="question-step" data-step="{{ $index }}" style="{{ $index == 0 ? '' : 'display:none;' }}">
                                    <h4>{{ $question->question }}</h4>
                                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                                    @php $response = $responses[$question->id]->answer ?? null; @endphp
                    
                                    @if($question->type === 'textarea')
                                        <textarea name="answer" class="form-control">{{ $response }}</textarea>
                    
                                    @elseif($question->type === 'radio')
                                    @foreach(json_decode($question->options) as $option)
                                    <div>
                                        <input type="radio" name="answer" value="{{ $option }}"
                                            @if($response == $option) checked="checked" @endif> {{ $option }}
                                    </div>
                                @endforeach
                                
                    
                                    @elseif($question->type === 'checkbox')
                                        @php $selectedOptions = json_decode($response) ?? []; @endphp
                                        @foreach(json_decode($question->options) as $option)
                                            <div>
                                                <input type="checkbox" name="answer[]" value="{{ $option }}"
                                                    {{ in_array($option, $selectedOptions) ? 'checked' : '' }}> {{ $option }}
                                            </div>
                                        @endforeach
                                    @endif
                    
                                    <br>
                                    @if($index > 0)
                                        <button type="button" class="btn btn-secondary prev">Previous</button>
                                    @endif
                    
                                    <button type="button" class="btn btn-primary next">{{ $index == count($questions) - 1 ? 'Submit' : 'Next' }}</button>
                                </div>

                            </form>    
                            @endforeach
                   
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection
