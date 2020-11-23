<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="{{ asset('/css/index.css')}}">
     <!-- <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{csrf_token()}}"> -->
</head>
<body>
     <div class="container">
          <div class="logo">
               <img class="logo" src="{{ asset('/img/logo.svg') }}" alt="logo">
          </div>
          <div class="form">
               <form action="/start">
               @csrf
                    <input type="text" name="subject">
                    <button>Let's Study</button>
               </form>
               <a href="/finish">Finish Study</a>
          </div>
          
          <a href="/record">記録する</a>
          <div class="fusen">
               <ul>
                    @foreach($params as $param)
                    <li>
                         <p>{{$user->find($param->user_id)->name}}</p>
                         <p>{{$param->subject}}</p>
                         <p>開始時間：  {{$param->time_start}}</p>
                         <p>終了時間：  {{$param->time_finish}}</p>
                         @if($param->totaltime || $param->totaltime==0)
                         <p>学習時間：  {{$param->totaltime}}時間</p>
                         @endif
                         <p>{{$param->status}}</p>
                    </li>
                    @endforeach
               </ul>
          </div>
     </div>
</body>
</html>