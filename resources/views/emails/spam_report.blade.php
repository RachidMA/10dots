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
            display: flex;
        }

        .email-container p:last-child {
            margin-bottom: 0;
        }
    </style>
</head>

<body>

    <div class="email-container" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <h1>Spam Report <span>
                <p>Date: <span id="current-date">{{ now()->format('Y-m-d') }}</span></p>
            </span></h1>
        <p>Dear {{$data['user']->name}},</p>
        <p>This email is to inform you about a spam report that we have received.</p>
        <p>Email: {{$data['user']->email}}</p>
        <p>Your current Spam Report Count: {{$data['spamReportCount']}}</p>
        <p>Please be aware that if the number of spam reports reaches 5, your profile will be automatically deleted as per our policy.</p>
        <p>If you have any questions or concerns, please feel free to contact us at {{$data['admin_email']}}.</p>
        <p>Thank you for your attention to this matter.</p>
    </div>
</body>

</html>