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

        .card {
            background-color: #ffffff;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            height: 600px;
            /* max-width: 500px;
            width: 100% !important; */
            display: flex;
            /* flex-direction: column; */
            /* align-items: center;
            text-align: center; */
        }

        h1 {
            color: #FF7F0A;
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
            background-color: #FF7F0A;
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
    </style>
</head>

<body>
    <div class="card" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <h1>Hi there,</h1>

        <p>Thank you for contacting us. We have received your message and will get back to you soon.</p>

        <h2>Details:</h2>
        <ul>
            <li><strong>Name:</strong> {{ $contact->name }}</li>
            <li><strong>Email:</strong> {{ $contact->email }}</li>
            <li><strong>Message:</strong> {{ $contact->message }}</li>
        </ul>
        <p class="signature">Best regards,<br><br><br>10dots</p>
        <p class="website-link">
            Visit our website: <a href="https://www.10dots.be" target="_blank">www.10dots.be</a>
        </p>

    </div>
</body>

</html>