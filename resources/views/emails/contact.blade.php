<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
<h2>New Contact Form Submission</h2>
<p><strong>Name:</strong> {{ $name }}</p>
<p><strong>Email:</strong> {{ $email }}</p>
<p><strong>Comment:</strong></p>
<p>{{ $comment }}</p>
{{--<p>{!! nl2br(e($message)) !!}</p>--}}
<hr>
<p>Sent from Darko Cekovski Portfolio</p>
</body>
</html>

