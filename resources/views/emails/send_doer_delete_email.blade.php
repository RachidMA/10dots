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
            display: flex;
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
    <div class="email-container" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <h1>Account Delete <span>
                <p>Date: <span id="current-date">{{ now()->format('Y-m-d') }}</span></p>
            </span></h1>
        <p>Doer {{$data['user']->name}},</p>
        <p>We regret to inform you that your account has been removed due to multiple spam reports.</p>
        <p>At our organization, we have a zero-tolerance policy towards spammers to maintain a safe and reliable environment for our users.</p>
        <p>If you believe this action has been taken in error, please feel free to contact us at {{$data['admin_email']}} for further assistance.</p>
        <p>Thank you for your understanding.</p>
    </div>
</body>



</html>