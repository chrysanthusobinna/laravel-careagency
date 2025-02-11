<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Thank You for Your Interest</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .email-container {
        background-color: whitesmoke;
        padding: 20px;
        border-radius: 8px;
        max-width: 600px;
        margin: auto;
        font-family: Arial, sans-serif;
      }
      .email-header {
        text-align: center;
        background-color: white;
        padding: 20px;
        border-bottom: 1px solid #ddd;
      }
      .email-body {
        background-color: white;
        padding: 20px;
      }
      .email-footer {
        background-color: white;
        padding: 10px;
        border-top: 1px solid #ddd;
        text-align: center;
        font-size: 12px;
        color: #555;
      }
      .btn-danger {
        color: white;
        background-color: #dc3545;
        border-color: #dc3545;
      }
      .btn-danger:hover {
        color: white;
        background-color: #c82333;
        border-color: #bd2130;
      }
    </style>
  </head>
  <body>
    <div class="email-container">
      
      <!-- Email Header -->
      <div class="email-header">
        <img src="{{ env('APP_URL') }}/mainsite-assets/images/logo-2.png" alt="{{ config('app.name') }} Logo">
        <h3>{{ config(key: 'app.name') }}</h3>
      </div>

      <!-- Email Body -->
      <div class="email-body">
        <h4>Thank You for Registering with {{ config('app.name') }}</h4>
        <p>Dear {{ $carerData['name'] }},</p>
        <p>Thank you for expressing your interest in joining {{ config('app.name') }} as a self-employed carer. Our team has received your details, and we will reach out to you soon to discuss the next steps.</p>
        <p>If you have any urgent questions, feel free to contact us:</p>
        <p>
          <strong>Email:</strong> <a href="mailto:{{ env('MAIL_USERNAME') }}">{{ env('MAIL_USERNAME') }}</a><br>
          <strong>Phone:</strong> <a href="tel:{{ env('COMPANY_PHONE_1') }}">{{ env('COMPANY_PHONE_1') }}</a>
        </p>
        <p>Best regards,</p>
        <p>The {{ config('app.name') }} Team</p>
      </div>

      <!-- Email Footer -->
      <div class="email-footer">
        <p>If you believe this email is not intended for you, please ignore it or contact us at 
          <a href="mailto:{{ env('MAIL_USERNAME') }}">{{ env('MAIL_USERNAME') }}</a>.
        </p>
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.</p>
      </div>
    </div>
  </body>
</html>
