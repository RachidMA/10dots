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
            padding-top: 5rem;
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

        .confirmation-link a {
            text-decoration: none;
            background-color: #ff7f0a;
            padding: 1rem 2rem;
            color: white;
        }

        .confirmation-link a:hover {
            text-decoration: none;
            background-color: white;
            border: 1px solid #ff7f0a;
            color: black;
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
    </style>
</head>

<body>
    <div class="email-container">
        <div class="card">
            <h1>Hi there,</h1>

            <p>
                We need you verification about the job that you have booked
            </p>
            <h2>Details:</h2>
            <ul>
                <li><strong>Job Title:</strong> {{ $data['job_object']['job_title']}}</li>
                <li><strong>Name:</strong> {{ $data['job_object']['first_name']}}</li>
            </ul>
            <p>
                Is the job completed successfully?
            </p>
            <p>By repling "YES", you will be taking back to job details page to leave review. Thank you</p>
            <div class="notifications-button">
                <p>BOOKED JOB ID IS : {{$data['booked_job_id']}}</p>
                <div class="confirmation-link">
                    <a href="{{route('confirm-work-done', ['id'=>$data['booked_job_id']])}}" class="confirm-yes">YES</a>
                </div>
            </div>
            <p class="signature">Best regards,<br /><br /><br />10dots</p>
            <p class="website-link">
                Visit our website:
                <a href="https://www.10dots.be" target="_blank">www.10dots.be</a>
            </p>
        </div>
    </div>
</body>

</html>