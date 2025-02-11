@extends('mainsite.layouts.app')

@section('title', config('app.name') . ' - Carer Terms and Conditions')

@section('header-class', 'header-style-one')

@section('content')
    <!-- Start main-content -->
    <section class="page-title" style="background-image: url(/mainsite-assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h2 class="title">Carer Terms and Conditions</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('mainsite.home') }}">Home</a></li>
                    <li>Carer Terms and Conditions</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!-- Carer Terms and Conditions Start -->
    <section class="terms-conditions py-5">
        <div class="container">
            <!-- Introduction -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">1. Introduction</h4>
                    <p>Welcome to {{ config('app.name') }}. These Terms and Conditions outline the rules and regulations governing your engagement as a self-employed carer providing services through our platform. By registering and offering your services via {{ config('app.name') }}, you agree to comply fully with these terms. Please read them carefully.</p>
                </div>
            </div>

            <!-- Eligibility Criteria -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">2. Eligibility Criteria</h4>
                    <p>To join {{ config('app.name') }} as a carer, you must meet the following requirements:</p>
                    <ul>
                        <li>Be at least 18 years of age.</li>
                        <li>Possess the necessary qualifications, certifications, and experience relevant to the care services you intend to provide.</li>
                        <li>Successfully complete our application process, including interviews, background checks, and verification procedures.</li>
                        <li>Maintain valid insurance coverage as required for the services offered.</li>
                        <li>Hold a valid right to work in the United Kingdom.</li>
                    </ul>
                </div>
            </div>

            <!-- Independent Contractor Status -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">3. Independent Contractor Status</h4>
                    <p>As a self-employed carer, you acknowledge and agree that:</p>
                    <ul>
                        <li>You operate as an independent contractor and are not an employee, agent, or partner of {{ config('app.name') }}.</li>
                        <li>You are solely responsible for managing your own taxes, insurance, and any other statutory obligations.</li>
                        <li>You have the discretion to accept or decline service requests based on your availability and preferences.</li>
                        <li>You are responsible for providing all necessary equipment and materials needed to perform your services.</li>
                    </ul>
                </div>
            </div>

            <!-- Service Delivery and Standards -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">4. Service Delivery and Standards</h4>
                    <p>When providing services through {{ config('app.name') }}, you agree to uphold the highest standards of professionalism and care, including:</p>
                    <ul>
                        <li>Delivering care services with compassion, respect, and consideration for the dignity and autonomy of clients.</li>
                        <li>Adhering to agreed-upon schedules and promptly communicating any changes or cancellations to clients and {{ config('app.name') }}.</li>
                        <li>Maintaining accurate and detailed records of services provided, including time logs, care notes, and any incidents or observations.</li>
                        <li>Complying with all applicable laws, regulations, health and safety guidelines, and industry standards.</li>
                        <li>Engaging in continuous professional development to enhance your skills and knowledge.</li>
                    </ul>
                </div>
            </div>

            <!-- Confidentiality and Data Protection -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">5. Confidentiality and Data Protection</h4>
                    <p>You must:</p>
                    <ul>
                        <li>Keep all client information strictly confidential and use it solely for the purpose of providing care services.</li>
                        <li>Not disclose any confidential information to third parties without explicit written consent from the client or as required by law.</li>
                        <li>Comply with all data protection laws, including the General Data Protection Regulation (GDPR), when handling personal data.</li>
                    </ul>
                </div>
            </div>

            <!-- Payment Terms -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">6. Payment Terms</h4>
                    <p>{{ config('app.name') }} will facilitate payments for services rendered as follows:</p>
                    <ul>
                        <li>Payments are processed weekly in arrears via bank transfer to your designated account.</li>
                        <li>You are responsible for submitting accurate invoices to {{ config('app.name') }} for the services provided.</li>
                        <li>In case of payment delays, interest may be charged at a rate of 2% per annum above the base rate of Barclays Bank plc from the due date until payment is made in full.</li>
                    </ul>
                </div>
            </div>

            <!-- Insurance and Liability -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">7. Insurance and Liability</h4>
                    <p>You are required to maintain appropriate insurance coverage, including:</p>
                    <ul>
                        <li>Professional indemnity insurance.</li>
                        <li>Public liability insurance.</li>
                        <li>Any other insurance required by law or relevant to the services you provide.</li>
                    </ul>
                    <p>{{ config('app.name') }} is not liable for any claims, damages, or losses arising from your provision of services.</p>
                </div>
            </div>

            <!-- Termination of Agreement -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">8. Termination of Agreement</h4>
                    <p>This agreement may be terminated by either party with a 14-day written notice. Immediate termination may occur under the following circumstances:</p>
                    <ul>
                        <li>Breach of these Terms and Conditions.</li>
                        <li>Conduct that jeopardizes the safety or well-being of clients.</li>
                        <li>Violation of any laws or regulations.</li>
                    </ul>
                </div>
            </div>

            <!-- Amendments to Terms -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">9. Amendments to Terms</h4>
                    <p>{{ config('app.name') }} reserves the right to amend these Terms and Conditions at any time. You will be notified of any changes, and continued use of the platform constitutes acceptance of the revised terms.</p>
                </div>
            </div>

            <!-- Dispute Resolution -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">10. Dispute Resolution</h4>
                    <p>In the event of any disputes arising between you and {{ config('app.name') }} or clients, efforts should be made to resolve the matter amicably through negotiation and communication. If a resolution cannot be reached, the dispute may be referred to mediation or arbitration as appropriate.</p>
                </div>
            </div>

            <!-- Governing Law -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">11. Governing Law</h4>
                    <p>These Terms and Conditions are governed by and construed in accordance with the laws of England and Wales. Any disputes shall be subject to the exclusive jurisdiction of the courts of England and Wales.</p>
                </div>
            </div>

            <!-- Acceptance of Terms -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">12. Acceptance of Terms</h4>
                    <p>By registering as a carer on the {{ config('app.name') }} platform, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions.</p>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">13. Contact Information</h4>
                    <p>If you have any questions or require clarification regarding these Terms and Conditions, please contact us at:</p>
                    <p>
                        Email: <a href="mailto:{{ $companyContact['email_1'] }}">{{ $companyContact['email_1'] }}</a><br>
                        Phone: <a href="tel:{{ $companyContact['phone_1'] }}">{{ $companyContact['phone_1'] }}</a><br>
                     </p>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Carer Terms and Conditions End -->
@endsection
