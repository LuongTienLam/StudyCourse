<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Welcome to the course-online {{ $data['user']->fullname }}!</h1>
    @if ($data['status'] == 'allow')
    <h3>Thank you for trusting us to register for our course</h3>
    <h5>The course you signed up for is: {{$data['user']->classes->first()->course->name}}</h5>
    <h5>Class schedule starts on {{ $data['user']->classes->first()->start }}, {{ $data['user']->classes->first()->schedule }}</h5>
    <h5>Your login password is {{ $data['passwordSend'] }}, you can change it in the system</h5>
    @else
    <h3>Thank you for trusting us to register for our course</h3>
    <h5>Sincerely sorry that the course is full, you can re-register for another course!</h5>
    @endif
    
</body>
</html>