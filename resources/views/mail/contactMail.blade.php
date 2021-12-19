<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ciao {{$user_contact['user']}}! Grazie per averci contattato!</h1>
    <h3>Ti ricontatteremo al più presto!</h3>

    <p>Il tuo messaggio:</p>
    <p>{{$user_contact['message']}}</p>
    
</body>
</html>