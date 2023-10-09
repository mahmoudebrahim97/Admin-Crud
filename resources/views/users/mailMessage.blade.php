<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Message</title>
</head>

<body>
    @if (count($details) > 1)
        <h1>{{ $details['name'] }}</h1>
        <h3>{{ $details['email'] }}</h3>
        <h4>{{ $details['message'] }}</h4>
        @else
        <h2>{{ $details['message'] }}</h2>
    @endif
</body>

</html>
