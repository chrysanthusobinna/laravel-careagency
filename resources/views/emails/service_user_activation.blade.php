<!DOCTYPE html>
<html>
<head>
    <title>Activate Your Account</title>
</head>
<body>
    <h2>Activate Your Account</h2>
    <p>Dear {{ $user->first_name }},</p>

    <p>Thank you for registering with {{ config('app.name') }}. To activate your account, please use the following 6-digit activation token:</p>

    <h3 style="background-color:#f3f3f3; padding:10px; text-align:center;">{{ $activationToken }}</h3>

    <p>Enter this token on the activation page to complete your registration.</p>

    <p>If you have any questions, feel free to contact us at <a href="mailto:{{ env('MAIL_USERNAME') }}">{{ env('MAIL_USERNAME') }}</a> or call us at <a href="tel:{{ env('COMPANY_PHONE_1') }}">{{ env('COMPANY_PHONE_1') }}</a>.</p>

    <p>Best regards,</p>
    <p>The {{ config('app.name') }} Team</p>
</body>
</html>
