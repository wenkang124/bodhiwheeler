<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Admin Account Has Been Created</title>
</head>
<body>
    <p>Hello {{ $admin['name'] }},</p>

    <p>Your admin account has been created successfully.</p>

    <p>Here are your account details:</p>
    <ul>
        <li>Name: {{ $admin['name'] }}</li>
        <li>Email: {{ $admin['email'] }}</li>
        <li>Password: {{ $password }}</li>
    </ul>

    <p>Make sure to change your password after logging in for security reasons.</p>

    <p>Thank you!</p>
</body>
</html>
