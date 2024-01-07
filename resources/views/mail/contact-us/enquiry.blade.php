<!DOCTYPE html>
<html lang="en">
    @php
    $email = $data['email'];
    $name = $data['name'];
    $subject = $data['subject'];
    $phone = $data['phone'] ? ' Phone : '.$data['phone'] : '';
    $message = $data['message'];
    @endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$name}} - Contact Form</title>
</head>

<body>
   
    <h4>Customer Name : {{$name}}</h4>
    <h4>Customer Email : {{$email}}</h4>
    <h4>Customer Phone : {{$phone}}</h4>
    <h4>Subject : {{$subject}}</h4>
    <h4>Message : </h4>
    <p>{{$message}}</p>
</body>

</html>