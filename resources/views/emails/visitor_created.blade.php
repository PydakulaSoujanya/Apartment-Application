<!DOCTYPE html>
<html>
<head>
    <title>Visitor Registration Successful</title>
</head>
<body>
    <h1>Visitor Registration Successful</h1>
    <p>Dear {{ $visitorName }},</p>
    <p>Thank you for registering your visit. Below are the details of your visit:</p>
    <ul>
        <li><strong>Visiting Date:</strong> {{ $visitingDate }}</li>
        <li><strong>Start Time:</strong> {{ $startTime }}</li>
        <li><strong>End Time:</strong> {{ $endTime }}</li>
    </ul>
    <p>Your QR code is shown below. Please bring it with you on your visit:</p>
    <p><img src="{{ $message->embed(public_path('visitor_qrcode/' . $qrCodeFilename)) }}" alt="QR Code"></p>
</body>
</html>
