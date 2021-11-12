<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
</head>
<body>
    <h1>Service</h1>

    <ul>
        @foreach ($services as $service)
            <li>{{ $service->name }}</li>
        @endforeach
    </ul>
</body>
</html>
