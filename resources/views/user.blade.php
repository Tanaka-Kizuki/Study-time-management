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
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
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
          <div class="profile">
               <div class="pro_img">
                    <img src="{{ asset('/img/logo.svg') }}" class="pro_bg">
                    <img src="{{ asset('/img/logo.svg') }}" class="pro_icon">
               </div>
               <div class="pro_content">
                    <p>{{$user->name}}</p>
                    <p>{{$user->email}}</p>
               </div>
          </div>
          
          @foreach($studies as $study)
          <div class="content">
               <div class="image">
                    @if($study->book_id)
                         <img class="book_image" src="{{$book->find($study->book_id)->image}}">
                    @else
                         <img class="book_image" src="{{ asset('/img/noimagepng.png') }}">
                    @endif
               </div>
               <div class="item">
                    <p>{{$study->subject}}</p>
                    <p class="time">{{$study->totaltime}}時間</p>
               </div>
          </div>
          @endforeach
     </div>
     
</body>
</html>