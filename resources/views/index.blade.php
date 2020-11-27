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

          <a href="start/record">START</a>
          <a href="/finish/record">FINISH</a>
          <a href="/book?id={{$login->id}}">書籍登録</a>
          <div class="fusen">
               <ul>
                    @foreach($params as $param)
                    <li>
                         <p>{{$user->find($param->user_id)->name}}</p>
                         <p>{{$param->status}}</p>
                         <p>{{$param->subject}}</p>
                         <p>開始時間：  {{$param->time_start}}</p>
                         <p>終了時間：  {{$param->time_finish}}</p>
                         @if($param->totaltime || $param->totaltime==0)
                         <p>学習時間：  {{$param->totaltime}}時間</p>
                         <p>{{$param->memo}}</p>
                         @endif
                    </li>
                    @endforeach
               </ul>
          </div>
     </div>
</body>
</html>