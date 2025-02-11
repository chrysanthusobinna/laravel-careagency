<!DOCTYPE html>
<html>
<head>
    <title>New Carer Registration Interest</title>
</head>
<body>
    <h2>New Carer Registration Interest</h2>
    <p>A new self-employed carer has expressed interest in joining {{ config('app.name') }}.</p>

    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <tr>
            <th>Name</th>
            <td>{{ $carerData['name'] }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $carerData['email'] }}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{{ $carerData['phone_number'] }}</td>
        </tr>
    </table>

    <p>Please follow up with the applicant at your earliest convenience.</p>
</body>
</html>
