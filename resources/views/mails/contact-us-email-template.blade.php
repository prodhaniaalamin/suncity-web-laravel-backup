<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email notification</title>
</head>
<body><br>
<h4>An enquiry has been submitted with the following information and message:</h4>
<br>
<p><b>Name: </b>{{ $name }}</p>
<p><b>Phone: </b>{{ $phone}}</p>
<p><b>Email: </b>{{ $email}}</p>
<p><b>Subject: </b>{{ $subject }}</p>
<p><b>Message: </b><br>{{ $message_content }}</p>
<br>
<br>
Regards,
Suncity Polyclinic
</body>
</html>
