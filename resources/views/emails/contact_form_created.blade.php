<!DOCTYPE html>
<html>

<head>
    <title>New Contact Form Submission</title>
</head>

<body>
    <h2>Contact Form Submission</h2>
    <p><strong>Name:</strong> {{ $contactData['name'] }}</p>
    <p><strong>Email:</strong> {{ $contactData['email'] }}</p>
    <p><strong>Phone:</strong> {{ $contactData['phone'] }}</p>
    <p><strong>Message:</strong> {{ $contactData['message'] }}</p>
    <p><strong>Source:</strong> {{ $contactData['source'] }}</p>
    @if (!empty($contactData['website']))
        <p><strong>Website:</strong> {{ $contactData['website'] }}</p>
    @endif
</body>

</html>
