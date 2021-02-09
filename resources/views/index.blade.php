<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="{{ asset('/css/welcom.css')}}">
     <!-- <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{csrf_token()}}"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/index.css')}}">
    <!-- <link href="{{ asset('css/user.css') }}" rel="stylesheet"> -->
</head>

<body>
     <div class="header">
          <a class="header_logo" href="/home">StudyShear</a>  
          <nav class="header_left">
               <ul>
                    <li><a href="/home">Home</a></li>
                    <li><a href="/how">How</a></li>
                    @guest
                        <li>
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                    @else
                         <li>
                            <div>
                                <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                </form>
                            </div>
                         </li>
                         <li id="user">
                              <a href="/user/{{Auth::user()->id}}">
                                <p>{{Auth::user()->name}}</p>
                                <p>{{Auth::user()->email}}</p>
                              </a>
                         </li> 
                    @endguest
                </ul>
          </nav>
     </div>
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

          <div class="fusen" id="app">
               <ul>
                    @foreach($params as $param)
                    <li>
                         <p class="date">{{$param->today}}</p>
                         <div class="user">
                              <img src="{{asset('storage/image/'.$image->find($param->user_id)->icon_name)}}" class="pro_icon">
                              <p class="name">{{$user->find($param->user_id)->name}}</p>
                         </div>
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
                                        <p><img class="clock" src="{{ asset('/img/clock.svg') }}" alt="clock"> {{$param->totaltime}}時間<like-component :post_id="{{$param->id}}"></like-component></p>
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
     <script src="{{mix('js/app.js')}}"></script>
</body>

</html>