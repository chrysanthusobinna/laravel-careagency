<!DOCTYPE html>
<html>
<head>
    <title>Password Reset Request</title>
</head>
<body>
    <h2>Password Reset Request</h2>
    <p>You are receiving this email because we received a password reset request for your account.</p>
    
    <p>Click the button below to reset your password:</p>

    <a href="{{ $resetUrl }}" style="display: inline-block; background-color: #e3342f; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
        Reset Password
    </a>

    <p>If you did not request a password reset, no further action is required.</p>

    <p>Best regards, <br> {{ config('app.name') }} Team</p>
</body>
</html>
