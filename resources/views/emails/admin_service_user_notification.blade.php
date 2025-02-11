<!DOCTYPE html>
<html>
<head>
    <title>New Service User Registered</title>
</head>
<body>
    <h2>New Service User Registration</h2>
    <p>A new service user has registered on {{ config('app.name') }}.</p>
    
    <table border="1" cellpadding="10">
        <tr>
            <td><strong>Full Name:</strong></td>
            <td>{{ $user->first_name }} {{ $user->middle_name ?? '' }} {{ $user->last_name }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td><strong>Phone Number:</strong></td>
            <td>{{ $user->phone_number }}</td>
        </tr>
    </table>

    <p>You can find this user in the admin dashboard to follow up on their needs and interests.</p>

    <p>Best regards,<br>
    {{ config('app.name') }} Team</p>
</body>
</html>
