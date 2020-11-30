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
          <div class="top">
               <div class="logo">
                    <img class="logo" src="{{ asset('/img/logo.svg') }}" alt="logo">
               </div>
               <div class="content">
                    <div class="content_inner">
                         <div class="button_list">
                              <a class="button_text" href="start/record">START</a>
                              <a class="button_text" href="/finish/record">FINISH</a>
                         </div>
                         <div class="button_touroku">
                              <a class="button_touroku_text" href="/book?id={{$login->id}}">書籍登録</a>
                         </div>
                    </div>
               </div>
          </div>

          <div class="fusen">
               <ul>
                    @foreach($params as $param)
                    <li>
                         <p class="date">{{$param->today}}</p>
                         <p class="name">{{$user->find($param->user_id)->name}}</p>
                         <div class="list">
                              <div class="image">
                                   @if($param->book_id)
                                   <img class="book_image" src="{{$book->find($param->book_id)->image}}">
                                   @else
                                   <img class="book_image" src="{{ asset('/img/noimagepng.png') }}">
                                   @endif
                              </div>
                              <div class="data">
                                   <div class="data_inner">
                                        @if($param->status === "勉強中")
                                        <p class="status">Studying Now</p>
                                        @endif
                                        <p>{{$param->subject}}</p>
                                        @if($param->totaltime || $param->totaltime==0)
                                        <p><img class="clock" src="{{ asset('/img/clock.svg') }}" alt="clock"> {{$param->totaltime}}時間</p>
                                        @endif
                                   </div>
                              </div>
                         </div>
                         <p>{{$param->memo}}</p>
                    </li>
                    @endforeach
               </ul>
          </div>
     </div>
</body>

</html>