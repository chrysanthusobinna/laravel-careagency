<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Notification | {{ config('app.name') }}</title>
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
        <h3>{{ config('app.name') }}</h3>
      </div>

      <!-- Email Body -->
      <div class="email-body">
        <h4>Hello {{ $user->first_name }},</h4>
        <p>We are pleased to inform you that we have received your request and our team will get back to you shortly.</p>

        <p>If you need immediate assistance, feel free to contact us:</p>
        <p>
          <strong>Email:</strong> <a href="mailto:{{ env('MAIL_USERNAME') }}">{{ env('MAIL_USERNAME') }}</a><br>
          <strong>Phone:</strong> <a href="tel:{{ env('COMPANY_PHONE_1') }}">{{ env('COMPANY_PHONE_1') }}</a>
        </p>

        <p>Thank you for choosing <strong>{{ config('app.name') }}</strong>!</p>

        <div class="text-center mt-4">
          <a href="{{ env('APP_URL') }}" class="btn btn-danger outline">Visit Our Website</a>
        </div>
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
