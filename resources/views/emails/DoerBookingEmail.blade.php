<!DOCTYPE html>
<html>

<head>
    <title>Booking in Progress</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .email-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: sans-serif;
            line-height: 1.5rem;
            padding-top: 4rem;
        }

        .card {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        h1 {
            color: #ff7f0a;
        }

        h2 {
            color: #555555;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a.button {
            display: inline-block;
            background-color: #ff7f0a;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }

        p.signature {
            margin-top: 40px;
            color: #777777;
            font-style: italic;
        }

        p.signature:before {
            content: "";
            display: block;
            width: 60px;
            height: 2px;
            background-color: #777777;
            margin: 10px auto;
        }

        .website-link {
            margin-top: 10px;
            color: #555555;
            font-size: 14px;
        }

        .notifications-button a {
            background-color: orange;
            padding: 1rem 1.3rem;
            text-decoration: none;
            color: white;
            font-weight: 300;
            font-family: sans-serif;
        }

        .notifications-button a:hover {
            background-color: white;
            border: 1px solid orange;
            color: rgba(0, 0, 0, 0.781);

        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="card">
            <h1>Hi there,</h1>

            <p>
                You have received a request from customer which willing to book you.
            </p>
            <p>
                Check your notifications to comfirm it
            </p>
            <div class="notifications-button">
                <a href="{{route('testing.notifications')}}">Go To Notifications</a>
            </div>

            <h2>Details:</h2>
            <ul>
                <li><strong>Email:</strong> {{ $data['customer_email']}}</li>
            </ul>
            <p class="signature">Best regards,<br /><br /><br />10dots</p>
            <p class="website-link">
                Visit our website:
                <a href="https://www.10dots.be" target="_blank">www.10dots.be</a>
            </p>
        </div>
    </div>
</body>

</html>