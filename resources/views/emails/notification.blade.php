<!DOCTYPE html>
<html>

<head>
    <!-- fontawsome kit link -->
    <script src="https://kit.fontawesome.com/0b78c4645d.js" crossorigin="anonymous"></script>
    <title>Booked a Job</title>
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
            /* max-width: 500px;
            width: 100% !important; */
            width: 100%;
            height: 600px;
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
    <div class="card" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <h1>Your services are needed</h1>

        <p>Hello,</p>
        <p>You have received this email because someone needs your services.
            Good luck!
        </p>

        <h2>Job Details:</h2>
        <ul>
            <li><strong>{{ $jobTitle }}<strong></li>
        </ul>

        <h2>Contact Information:</h2>
        <ul>
            <li><strong>Name:</strong> {{ $name }}</li>
            <li><strong>Phone:</strong> {{ $phone }}</li>
            <li><strong>Email:</strong> {{ $email }}</li>
            <li><strong>Date:</strong> {{ $date }}</li>
        </ul>



        <p>Click the button below to view the job details:</p>
        <a href="{{ route('jobDetails', ['id' => $jobId]) }}" target="_blank" class="button">View Job</a>

        <p class="signature">Best regards,<br><br><br>10dots</p>

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
                <a href="https://www.facebook.com/yourprofile" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.twitter.com/yourprofile" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.instagram.com/yourprofile" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </div>
</body>

</html>