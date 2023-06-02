<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Email</title>
</head>
<body>
    <h1>Contact Email</h1>
    <p>Hello,</p>
    <p>Thank you for contacting us. We have received your message and will get back to you soon.</p>
    
    <h2>Message Details:</h2>
    <ul>
        <li><strong>Name:</strong> {{ $contact->name }}</li>
        <li><strong>Email:</strong> {{ $contact->email }}</li>
        <li><strong>Message:</strong> {{ $contact->message }}</li>
    </ul>
    
    <p>Best regards,</p>
    <p>Your Company</p>
</body>
</html>