<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Spam Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
            margin: 0;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .email-container p:last-child {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h1>Account Delete <span>
                <p>Date: <span id="current-date">{{ now()->format('Y-m-d') }}</span></p>
            </span></h1>
        <p>Dear {{$data['user']->name}},</p>
        <p>Since you have reached to total spam report of: {{$data['spamReportCount']}}</p>
        <p>This email is to notify your account has been removed.</p>
        <p>This is our policy, and we do not tolerate spammers</p>
        <p>Thank you.</p>
    </div>
</body>

</html>