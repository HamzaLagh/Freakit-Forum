<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation mail</title>
</head>
<body>
    <div class="container">
        <img src="{{ asset('logo-freakit2.png') }}" alt="" srcset="" width="300" style="margin-top:100px " >
        <h2>Welcome {{$name}} Confirmation your Account {{$email}}</h2>
        <a href="{{ $href }}" class="btn btn-warning">Confirm ur mail</a>
    </div>



</body>
</html>