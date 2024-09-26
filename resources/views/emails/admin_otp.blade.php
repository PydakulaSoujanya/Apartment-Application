<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP for  Account Setup</title>
</head>
<body>
    <h1>OTP for  Account Setup</h1>
    <p>Hello,</p>
    <p>Your OTP for setting up your  account is <strong>{{ $otp }}</strong>.</p>
    <p>Please click the following link to set up your password:</p>
    <p><a href="{{ $url }}">{{ $url }}</a></p>
    <p>This OTP is valid only for one-time use.</p>
    <p>Thank you!</p>
</body>
</html>
