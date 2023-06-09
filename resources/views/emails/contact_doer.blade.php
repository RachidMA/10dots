<h1>Booked a job</h1>

<p>Hello,</p>
<p>You have received a new contact form submission regarding the job:</p>

<h2>Job Details:</h2>
<ul>
    <li><strong>Job Title:</strong> {{ $jobTitle }}</li>
</ul>

<h2>Contact Information:</h2>
<ul>
    <li><strong>Name:</strong> {{ $name }}</li>
    <li><strong>Phone:</strong> {{ $phone }}</li>
    <li><strong>Email:</strong> {{ $email }}</li>
    <li><strong>Date:</strong> {{ $date }}</li>
</ul>

<h2>Message:</h2>


<p>Click the button below to view the job details:</p>
<a href="{{ route('jobDetails', ['id' => $jobId]) }}"target="_blank" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; display: inline-block; border-radius: 4px;">View Job</a>

<p>Best regards,</p>
<p>10dots</p>


