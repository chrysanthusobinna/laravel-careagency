<!DOCTYPE html>
<html>
<head>
    <title>Thank You for Your Interest</title>
</head>
<body>
    <h2>Thank You for Registering with {{ config('app.name') }}</h2>
    <p>Dear {{ $carerData['name'] }},</p>

    <p>Thank you for expressing your interest in joining {{ config('app.name') }} as a self-employed carer. Our team has received your details, and we will reach out to you soon to discuss the next steps.</p>

    <p>If you have any urgent questions, feel free to contact us at <a href="mailto:{{ env('MAIL_USERNAME') }}">{{ env('MAIL_USERNAME') }}</a> or call us at <a href="tel:{{ env('COMPANY_PHONE_1') }}">{{ env('COMPANY_PHONE_1') }}</a>.</p>

    <p>Best regards,</p>
    <p>The {{ config('app.name') }} Team</p>
</body>
</html>
