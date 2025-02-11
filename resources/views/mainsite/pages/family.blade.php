@extends('mainsite.layouts.app')

@section('title', config('app.name') . ' - Family')

@section('header-class', 'header-style-one')

@section('content')
<!-- Start main-content -->
<section class="page-title" style="background-image: url(/mainsite-assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Family</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('mainsite.home') }}">Home</a></li>
                <li>Family</li>
            </ul>
        </div>
    </div>
</section>
<!-- end main-content -->

 
 


<section class="team-details team-contact-form">
    <div class="auto-container">
        <br/>
        <h2>Search and Connect with Self-Employed Carers</h2>
        <hr/>
        <div class="row">
            <div class="col-lg-6  mt-5">
                <div class="content">
            
                    <div class="text">
                        <p>Helping families and self-employed carers across the UK.</p>
                        <p>{{ config('app.name') }} lets you arrange and manage care seamlessly. We provide a comprehensive system to capture and manage recipient details, keeping healthcare information up-to-date in one place to ensure safe and sufficient care delivery.</p>
                        <ul class="list-style-two">
                            <li><i class="fa fa-check"></i> Easily update details when things change</li>
                            <li><i class="fa fa-check"></i> Allow carers to fully understand care needs</li>
                            <li><i class="fa fa-check"></i> Clinical team on hand to review</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Image Column -->
            <div class="col-lg-6  mt-5">
                <div class="image-box">
                    <img src="/mainsite-assets/images/resource/work-2.jpg" alt="Family Care" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>

        <!-- Carer Review Section -->
        <div class="row mt-5">
            <div class="col-lg-6 order-lg-2">
                <div class="content">
                    <div class="sec-title">
                        <h2>Review and Communicate with Carers</h2>
                    </div>
                    <p>Review suitable carers interested in providing care for your loved one. Use our chat feature to communicate, review previous experience, and verify background checks conducted by {{ config('app.name') }}. Connect directly with carers and our support team for assistance.</p>
                </div>
            </div>
            <!-- Image Column -->
            <div class="col-lg-6 order-lg-1  mb-5">
                <div class="image-box">
                    <img src="/mainsite-assets/images/resource/image-2.jpg" alt="Carer Review" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>

 
    </div>
</section>




<section class="team-details-contact-form">
    <div class="container pb-100">
 
    

        <div class="innerpage mt-2">
            <h3>Frequently Asked Questions</h3>
            <p>We understand that finding the right care solution can come with many questions. Below are answers to some of the most common queries about our service.</p>
            <ul class="accordion-box wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                <!--Block-->
                <li class="accordion block">
                    <div class="acc-btn">How do I choose my carer?
                        <div class="icon fa fa-plus"></div>
                    </div>
                    <div class="acc-content" style="display: none;">
                        <div class="content">
                            <div class="text">
                                After you contact us with your care requirements, we'll carefully review your information and uniquely match you with a selection of carers that we believe will be a great fit for you. You'll have the opportunity to review detailed profiles for each carer you're matched with in your account, along with their photo, experience, interests, and what they enjoy about being a carer. You can then confirm which carer you prefer and communicate directly with them using the chat feature or arrange a phone call.
                            </div>
                        </div>
                    </div>
                </li>
                <!--Block-->
                <li class="accordion block">
                    <div class="acc-btn">How are self-employed carers vetted?
                        <div class="icon fa fa-plus"></div>
                    </div>
                    <div class="acc-content" style="display: none;">
                        <div class="content">
                            <div class="text">
                                We take the vetting of self-employed carers very seriously to ensure the highest quality of care. All carers undergo a thorough screening process, including background checks, interviews, and reference verification. They must also provide proof of qualifications and experience relevant to the care services they offer. Additionally, carers are required to pass our training programs and demonstrate a commitment to compassionate and professional care.
                            </div>
                        </div>
                    </div>
                </li>
                <!--Block-->
                <li class="accordion block">
                    <div class="acc-btn">Will a live-in carer attend to my loved one’s personal needs?
                        <div class="icon fa fa-plus"></div>
                    </div>
                    <div class="acc-content" style="display: none;">
                        <div class="content">
                            <div class="text">
                                Yes. Live-in carers provide personal care, which may include assistance with toileting, washing and bathing, dressing, oral care, grooming, and medication prompting. If your loved one feels uncomfortable receiving help with intimate personal care, it's important to detail the level of support or supervision needed in your care request and profile to ensure the best match.
                            </div>
                        </div>
                    </div>
                </li>
                <!--Block-->
                <li class="accordion block">
                    <div class="acc-btn">Do live-in carers provide night-time support?
                        <div class="icon fa fa-plus"></div>
                    </div>
                    <div class="acc-content" style="display: none;">
                        <div class="content">
                            <div class="text">
                                Absolutely. Live-in carers reside in your loved one's home to offer 24-hour care, including nighttime support as needed. They help establish bedtime routines and assist with night-time needs such as toileting, reassurance, and mobility assistance.
                            </div>
                        </div>
                    </div>
                </li>
                <!--Block-->
                <li class="accordion block">
                    <div class="acc-btn">How does live-in care work once in place?
                        <div class="icon fa fa-plus"></div>
                    </div>
                    <div class="acc-content" style="display: none;">
                        <div class="content">
                            <div class="text">
                                When a new carer moves in, it may take some time to establish a comfortable routine. Care schedules are personalized to meet individual needs. Typically, a carer stays for about four weeks before taking a break, during which a temporary carer provides respite care. This ensures continuity and familiarity for your loved one.
                            </div>
                        </div>
                    </div>
                </li>
                <!--Block-->
                <li class="accordion block">
                    <div class="acc-btn">Can I request a male or female carer?
                        <div class="icon fa fa-plus"></div>
                    </div>
                    <div class="acc-content" style="display: none;">
                        <div class="content">
                            <div class="text">
                                Yes, you can specify your preference for a male or female carer when making a care request to ensure comfort and compatibility.
                            </div>
                        </div>
                    </div>
                </li>
                <!--Block-->
                <li class="accordion block">
                    <div class="acc-btn">What happens when the carer takes time off?
                        <div class="icon fa fa-plus"></div>
                    </div>
                    <div class="acc-content" style="display: none;">
                        <div class="content">
                            <div class="text">
                                When your primary carer takes time off, we arrange for a respite carer to ensure care continuity. Respite carers are selected based on their skills and experience to match your needs.
                            </div>
                        </div>
                    </div>
                </li>
                <!--Block-->
                <li class="accordion block">
                    <div class="acc-btn">How do I manage my live-in care?
                        <div class="icon fa fa-plus"></div>
                    </div>
                    <div class="acc-content" style="display: none;">
                        <div class="content">
                            <div class="text">
                                You can manage all aspects of your care through your online account. This includes reviewing carer profiles, selecting a carer, updating care requirements, and tracking care logs.
                            </div>
                        </div>
                    </div>
                </li>
                <!--Block-->
                <li class="accordion block">
                    <div class="acc-btn">How does {{ config('app.name') }} handle emergencies?
                        <div class="icon fa fa-plus"></div>
                    </div>
                    <div class="acc-content" style="display: none;">
                        <div class="content">
                            <div class="text">
                                Our carers are trained to handle urgent situations and provide immediate assistance while ensuring safety and well-being. Our support team is available to offer guidance in case of emergencies.
                            </div>
                        </div>
                    </div>
                </li>
                <!--Block-->
                <li class="accordion block">
                    <div class="acc-btn">Can I meet my carer before they move in?
                        <div class="icon fa fa-plus"></div>
                    </div>
                    <div class="acc-content" style="display: none;">
                        <div class="content">
                            <div class="text">
                                Yes, you can meet your carer before they move in. You can arrange a video call or an in-person visit through your online account to ensure confidence in your choice.
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        

    </div>
</section>

<!-- Call to Action -->
<section class="cta-section text-center py-5 bg-light">
    <h2 class="fw-bold">Find the Right Care with {{ config('app.name') }}</h2>
    <p>Take the first step towards personalized and compassionate care. Join {{ config('app.name') }} today and connect with dedicated carers ready to support your needs.</p>
    
    @if (Auth::guest())
        <a href="{{ route('mainsite.register') }}" class="theme-btn btn-style-one mb-3 mb-sm-0">Register Now</a>
    @endif

</section>

@endsection
