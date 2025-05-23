<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Credentials</title>
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f1f5f9; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 30px auto; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); text-align: left;">
        <h1 style="text-align: center; color: #2c3e50; margin-bottom: 30px;">
            Welcom To Border Haul</h1>
        <p style="color: #5a6772; line-height: 1.6; font-size: 16px; text-align: center;">
            Thank you for creating an account with Border Haul.
        </p>
        <p style="color: #5a6772; line-height: 1.6; font-size: 16px;">
            <span style="font-weight: bold; color: #2c3e50; text-align: center;">
            Your account email:</span> {{ $email }}
        </p>

        <a href="{{ url('https://dev.borderhaul.com/carrier/login') }}"
           style="display: block; width: fit-content; margin: 30px auto 0; background-color: #2d3748; color: white; padding: 12px 24px; border: none; border-radius: 5px; text-decoration: none; font-weight: bold;">Login</a>
        <p style="color: #5a6772; line-height: 1.6; font-size: 16px; margin-top: 30px;">Thank you,<br>Regards,<br><strong>Border Haul</strong></p>
    </div>
</body>
</html>
