@extends('mainsite.layouts.app')

@section('title', 'Privacy Policy')

@section('header-class', 'header-style-one')

@section('content')
    <!-- Start main-content -->
    <section class="page-title" style="background-image: url(images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">Privacy Policy</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('mainsite.home') }}">Home</a></li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->
 <!-- #region -->


 <!-- Privacy Policy Section -->
<section class="privacy-policy-section py-5">
    <div class="auto-container">
        <div class="sec-title text-center mb-5">
            <h2>Our Commitment to Your Privacy</h2>
        </div>
        <div class="content">
            <p>At CarePass, we are dedicated to protecting your privacy and ensuring the security of your personal information. This Privacy Policy outlines how we collect, use, and safeguard your data when you interact with our services. By using our website or services, you agree to the terms outlined in this policy.</p>

            <h4>1. Information We Collect</h4>
            <p>We collect the following types of information to provide and improve our services:</p>
            <ul class="list-unstyled">
                <li><strong>Personal Information:</strong> Name, email address, phone number, and home address when you register or contact us.</li>
                <li><strong>Health Information:</strong> Medical history, care preferences, and other details necessary to provide personalized care services.</li>
                <li><strong>Technical Information:</strong> IP address, browser type, device information, and usage data collected through cookies and analytics tools.</li>
            </ul>

            <h4>2. How We Use Your Information</h4>
            <p>We use your information for the following purposes:</p>
            <ul class="list-unstyled">
                <li>To provide and manage care services tailored to your needs.</li>
                <li>To communicate with you about appointments, updates, and service-related inquiries.</li>
                <li>To improve our website, services, and user experience.</li>
                <li>To comply with legal obligations and protect against fraudulent activities.</li>
            </ul>

            <h4>3. Data Protection and Security</h4>
            <p>We take your privacy seriously and implement robust security measures to protect your data:</p>
            <ul class="list-unstyled">
                <li>All personal and health information is encrypted and stored securely.</li>
                <li>Access to your data is restricted to authorized personnel only.</li>
                <li>We regularly update our systems and conduct security audits to prevent unauthorized access.</li>
            </ul>

            <h4>4. Sharing of Information</h4>
            <p>We do not sell or rent your personal information to third parties. However, we may share your data in the following circumstances:</p>
            <ul class="list-unstyled">
                <li>With caregivers and service providers to deliver the care services you request.</li>
                <li>With legal authorities if required by law or to protect our rights and safety.</li>
                <li>With your consent, for specific purposes such as referrals or partnerships.</li>
            </ul>

            <h4>5. Your Rights</h4>
            <p>You have the following rights regarding your personal data:</p>
            <ul class="list-unstyled">
                <li><strong>Access:</strong> Request a copy of the personal data we hold about you.</li>
                <li><strong>Correction:</strong> Update or correct any inaccurate or incomplete information.</li>
                <li><strong>Deletion:</strong> Request the deletion of your data, subject to legal obligations.</li>
                <li><strong>Opt-Out:</strong> Unsubscribe from marketing communications at any time.</li>
            </ul>
            <p>To exercise these rights, please <a href="{{ route('mainsite.contact') }}">contact us</a>.</p>

            <h4>6. Cookies and Tracking Technologies</h4>
            <p>We use cookies and similar technologies to enhance your experience on our website. Cookies help us analyze traffic, remember your preferences, and improve our services. You can manage your cookie preferences through your browser settings.</p>

            <h4>7. Retention of Information</h4>
            <p>We retain your personal information for as long as necessary to provide our services, comply with legal obligations, resolve disputes, and enforce our agreements. When your information is no longer required, we will securely delete or anonymize it.</p>

            <h4>8. International Data Transfers</h4>
            <p>Your personal information may be transferred to and processed in countries other than your own. We ensure that appropriate safeguards are in place to protect your data, in accordance with applicable data protection laws.</p>

            <h4>9. Changes to This Policy</h4>
            <p>We may update this Privacy Policy from time to time to reflect changes in our practices or legal requirements. We will notify you of significant changes by posting a notice on our website or contacting you directly. We encourage you to review this policy periodically.</p>

 
        </div>
    </div>
</section>
<!-- End Privacy Policy Section -->


@endsection
