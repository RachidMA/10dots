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
            background-color: #9F9F9F;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            width: 100% !important;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        h1 {
            color: #4CAF50;
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
            background-color: #4CAF50;
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
        p.contact-info {
            margin-top: 20px;
            color: #555555;
            font-size: 14px;
        }
        .website-link {
            margin-top: 10px;
            color: #555555;
            font-size: 14px;
        }
        .social-icons {
            margin-top: 20px;
        }
        .social-icons a {
            margin-right: 10px;
        }
        .social-icons img {
            height: 24px;
            width: 24px;
        }
        .footer {
            margin-top: 40px;
            color: #777777;
            font-size: 12px;
        }
        .footer:before {
            content: "";
            display: block;
            width: 60px;
            height: 1px;
            background-color: #777777;
            margin: 10px auto;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Booking in Progress</h1>

        <p>Hello,</p>
        <p>Thank you for contacting us. We have received your message and will get back to you as soon as possible.</p>

        <h2>Message Details:</h2>
        <ul>
            <li><strong>Job Title:</strong> {{ $jobTitle }}</li>
        </ul>

        <p>Click the button below to go back to the job details:</p>
        <a href="{{ route('jobDetails', ['id' => $jobId]) }}" target="_blank" class="button">Go to Job</a>

        <p class="signature">Best regards,<br>10dots</p>

        <div class="footer">
            <p class="contact-info">
                Phone: +123456789<br>
                Email: contact.10dots@gmail.com<br>
                Address: 189 Aluwiz, 9000 Gent
            </p>
            <p class="website-link">
                Visit our website: <a href="https://www.10dots.be" target="_blank">www.10dots.be</a>
            </p>
            <div class="social-icons">
                <a href="https://www.facebook.com/yourprofile" target="_blank"><img src="facebook-icon.png" alt="Facebook"></a>
                <a href="https://www.twitter.com/yourprofile" target="_blank"><img src="twitter-icon.png" alt="Twitter"></a>
                <a href="https://www.instagram.com/yourprofile" target="_blank"><img src="instagram-icon.png" alt="Instagram"></a>
            </div>
        </div>
    </div>
</body>
</html>






