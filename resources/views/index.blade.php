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
          <div class="content">
               <form action="/start">
               @csrf
                    <input type="text" name="subject">
                    <button>Let's Study</button>
               </form>
               <a href="/finish">Finish Study</a>
          </div>
          <div class="box">
               @foreach($params as $param)
               <p>{{$user->find($param->user_id)->name}}</p>
               <p>{{$param->subject}}</p>
               <p>{{$param->time_start}}</p>
               <p>{{$param->time_finish}}</p>
               @if($param->totaltime || $param->totaltime==0)
               <p>{{$param->totaltime}}時間</p>
               @endif
               <p>{{$param->status}}</p>
               @endforeach
          </div>
     </div>
     <!-- <script src="{{ mix('/js/app.js') }}"></script> -->

</body>
</html>