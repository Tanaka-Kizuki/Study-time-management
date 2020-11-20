<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="{{ asset('/css/index.css')}}">
</head>
<body>
     <div class="container">
          <div class="logo">
               <img class="logo" src="{{ asset('/img/logo.svg') }}" alt="logo">
          </div>
          <div class="content">
               <a href="/start">Let's Study</a>
               <a href="/finish">Finish Study</a>
          </div>
          <div class="box">
               @foreach($params as $param)
               <p>{{$param->today}}</p>
               <p>{{$param->totaltime}}</p>
               @endforeach
          </div> 
     </div>
</body>
</html>