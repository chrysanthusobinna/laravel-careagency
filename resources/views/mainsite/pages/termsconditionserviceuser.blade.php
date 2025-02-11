@extends('mainsite.layouts.app')

@section('title', config('app.name') . ' - Service User Terms and Conditions')

@section('header-class', 'header-style-one')

@section('content')
    <!-- Start main-content -->
    <section class="page-title" style="background-image: url(/mainsite-assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h2 class="title">Service User Terms and Conditions</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('mainsite.home') }}">Home</a></li>
                    <li>Service User Terms and Conditions</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!-- Service User Terms and Conditions Start -->
    <section class="terms-conditions py-5">
        <div class="container">
            <!-- Introduction -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">1. Introduction</h4>
                    <p>Welcome to {{ config('app.name') }}. These Terms and Conditions outline the rules and regulations for service users utilizing our platform to connect with self-employed carers. By accessing and using {{ config('app.name') }}, you agree to comply with these terms. Please read them carefully.</p>
                </div>
            </div>

            <!-- Eligibility Criteria -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">2. Eligibility Criteria</h4>
                    <p>To use {{ config('app.name') }}, you must:</p>
                    <ul>
                        <li>Be at least 18 years old or have the consent of a legal guardian.</li>
                        <li>Provide accurate and complete information during the registration process.</li>
                        <li>Comply with all applicable laws and regulations when using our services.</li>
                    </ul>
                </div>
            </div>

            <!-- Service Usage -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">3. Service Usage</h4>
                    <p>When using {{ config('app.name') }}, you agree to:</p>
                    <ul>
                        <li>Use the platform solely for lawful purposes and in accordance with these terms.</li>
                        <li>Respect the privacy and confidentiality of carers and other service users.</li>
                        <li>Provide honest and constructive feedback to carers.</li>
                        <li>Refrain from any form of harassment, discrimination, or abusive behavior.</li>
                    </ul>
                </div>
            </div>

            <!-- Booking and Payment -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">4. Booking and Payment</h4>
                    <p>When booking care services through {{ config('app.name') }}, you agree to:</p>
                    <ul>
                        <li>Accurately describe your care needs and preferences.</li>
                        <li>Make timely payments for services rendered as per the agreed terms.</li>
                        <li>Adhere to the cancellation and refund policies outlined by {{ config('app.name') }}.</li>
                    </ul>
                    <p>Payments are processed securely through our payment gateway, and invoices will be provided for all transactions.</p>
                </div>
            </div>

            <!-- Confidentiality and Data Protection -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">5. Confidentiality and Data Protection</h4>
                    <p>We value your privacy and are committed to protecting your personal data. Please refer to our Privacy Policy for detailed information on how we collect, use, and protect your data.</p>
                </div>
            </div>

            <!-- Service Quality and Dispute Resolution -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">6. Service Quality and Dispute Resolution</h4>
                    <p>We strive to ensure high-quality care services through our platform. If you encounter any issues or disputes, please contact our support team. We will make every effort to resolve disputes amicably and efficiently.</p>
                </div>
            </div>

            <!-- Termination of Service -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">7. Termination of Service</h4>
                    <p>We reserve the right to terminate or suspend your access to {{ config('app.name') }} at any time, with or without notice, for any violation of these terms or any conduct that we deem harmful to our community.</p>
                </div>
            </div>

            <!-- Amendments to Terms -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">8. Amendments to Terms</h4>
                    <p>We may amend these Terms and Conditions from time to time. You will be notified of any changes, and continued use of the platform constitutes acceptance of the revised terms.</p>
                </div>
            </div>

            <!-- Governing Law -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">9. Governing Law</h4>
                    <p>These Terms and Conditions are governed by and construed in accordance with the laws of England and Wales. Any disputes arising from these terms shall be subject to the exclusive jurisdiction of the courts of England and Wales.</p>
                </div>
            </div>

            <!-- Acceptance of Terms -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">10. Acceptance of Terms</h4>
                    <p>By using {{ config('app.name') }}, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions.</p>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">11. Contact Information</h4>
                    <p>If you have any questions or require clarification regarding these Terms and Conditions, please contact us at:</p>
                    <p>
                        Email: <a href="mailto:{{ $companyContact['email_1'] }}">{{ $companyContact['email_1'] }}</a><br>
                        Phone: <a href="tel:{{ $companyContact['phone_1'] }}">{{ $companyContact['phone_1'] }}</a><br>
                        
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Service User Terms and Conditions End -->
@endsection
