<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        /* CSS styles go here */
        .email-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: sans-serif;
            line-height: 1.5rem;
        }

        .card {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 0.75rem 1rem;
            background-color: #4f46e5;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #4338ca;
        }

        .signature {
            margin-top: 2rem;
        }

        .contact-info {
            margin-bottom: 1rem;
        }

        .website-link {
            margin-top: 1rem;
        }

        .social-icons a {
            margin-right: 0.5rem;
            color: #4f46e5;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #4338ca;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="card">
            <h1>You have booked a doer</h1>

            <p>Hello,</p>
            <p>
                Thank you for booking a doer with us. We have received your message
                and will get back to you as soon as possible.
            </p>

            <h2>Message Details:</h2>
            <!-- <ul>
          <li><strong>Job Title:</strong> {{ $jobTitle }}</li>
        </ul> -->
            <h4><strong>Job Title:</strong> {{ $jobTitle }}</h4>
            <p>Click the button below to go back to the job details:</p>
            <a href="{{ route('jobDetails', ['id' => $jobId]) }}" target="_blank" class="button">Go to Job</a>

            <p class="signature">Best regards,<br /><br /><br />10dots</p>

            <div class="footer">
                <p class="contact-info">
                    Phone: +123456789<br />
                    Email: contact.10dots@gmail.com<br />
                    Address: 189 Aluwiz, 9000 Gent
                </p>
                <p class="website-link">
                    Visit our website:
                    <a href="https://www.10dots.be" target="_blank">www.10dots.be</a>
                </p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/yourprofile" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.twitter.com/yourprofile" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/yourprofile" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>