<!DOCTYPE html>
<html>
<head>
    <title>Welcome to {{ config('app.name') }}</title>
</head>
<body>
    <h2>Welcome to {{ config('app.name') }}</h2>
    <p>Dear {{ $user->first_name }},</p>

    <p>Thank you for registering with {{ config('app.name') }}. Our team has been notified of your registration and will reach out to you shortly to discuss your needs and how we can assist you.</p>

    <p>If you have any questions, feel free to contact us at <a href="mailto:{{ env('MAIL_USERNAME') }}">{{ env('MAIL_USERNAME') }}</a> or call us at <a href="tel:{{ env('COMPANY_PHONE_1') }}">{{ env('COMPANY_PHONE_1') }}</a>.</p>

    <p>Best regards,</p>
    <p>The {{ config('app.name') }} Team</p>
</body>
</html>
