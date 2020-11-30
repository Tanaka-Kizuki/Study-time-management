<!DOCTYPE html>
<html lang="{ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/welcom.css')}}">
        <style>
            body {
                background-image: url({{ asset('/img/welcome.jpg') }});
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <h1 class="title">Study</h1>
            <a class="login btn" href="/login">Login</a>
            <a class="register btn" href="/register">Register</a>
        </div>
        
    </body>
</html>
