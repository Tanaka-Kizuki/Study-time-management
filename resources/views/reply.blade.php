<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Reply</title>
     <link rel="stylesheet" href="{{ asset('/css/welcom.css')}}">
     <link rel="stylesheet" href="{{ asset('/css/reply.css')}}">
     <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
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
                              <a  class ="user" href="/user/{{Auth::user()->id}}">
                                   <div class="user_name">
                                        <p>{{Auth::user()->name}}</p>
                                        <p>{{Auth::user()->email}}</p>
                                   </div>
                              </a>
                         </li>
                    @endguest
                </ul>
          </nav>
     </div>
     <div class="container">
          <div class="content">
               <div class="content_inner">
                    <div class="user">
                         @if($image->find($data->user_id)->icon_name=="noimagepng.png")
                         <img src="{{ asset('/img/noimagepng.png') }}" class="pro_icon">
                         @else
                         <img src="{{$image->find($data->user_id)->icon_name}}" class="pro_icon">
                         @endif
                         <p class="name">{{$user->find($data->user_id)->name}}</p>
                    </div>
                    <div class="list">
                         <div class="image">
                         @if($data->book_id)
                              <img class="book_image" src="{{$book->find($data->book_id)->image}}">
                         @else
                              <img class="book_image" src="{{ asset('/img/noimagepng.png') }}">
                         @endif
                         </div>
                         <div class="data">
                              <div class="data_inner">
                              @if($data->status === "勉強中")
                              <p class="status">Studying Now</p>
                              @endif
                              <p>{{$data->subject}}</p>
                              @if($data->totaltime || $data->totaltime==0)
                              <p><img class="clock" src="{{ asset('/img/clock.svg') }}" alt="clock"> {{$data->totaltime}}時間
                              @endif
                              </div>
                         </div>
                    </div>
               </div>
               <p>{{$data->memo}}</p>
          </div>
          <div class="form">
               <form action="/reply/add" method="post">
               @csrf
                    <i class="fas fa-reply"></i>
                    <input name="study_id" type="hidden" value="{{$data->id}}">
                    <input name="user_id" type="hidden" value="{{$login->id}}">
                    <input  name="reply" type="text" id="reply">
                    <input type="submit" value="返信">
               </form>
          </div>
          <div class="reply">
               @foreach($replys as $reply)
               <div class="user">
                    @if($image->find($reply->user_id)->icon_name=="noimagepng.png")
                    <img src="{{ asset('/img/noimagepng.png') }}" class="pro_icon">
                    @else
                    <img src="{{$image->find($reply->user_id)->icon_name}}" class="pro_icon">
                    @endif
                    <p class="name">{{$user->find($reply->user_id)->name}}</p>
               </div>
               <div class="coment">
                    <p>{{$reply->reply}}</p>
               </div>
               @endforeach
          </div>
     </div>
</body>
</html>
