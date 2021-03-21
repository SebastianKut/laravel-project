<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dupa</h1>
    <p>This is my first laravel page</p>
    {{-- using {{$variable}} we sanitize the string so user wont inject code and everything will become a string
    To avoid sanitazation we can use {!!$Variable!!} --}}
    <p>{{$name}}</p>

</body>
</html>
