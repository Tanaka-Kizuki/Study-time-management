<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>UserPage</title>
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
                    @if($image->img_name=="noimagepng.png")
                    <img src="{{ asset('/img/noimagepng.png') }}" class="pro_bg">
                    @else
                    <img src="{{$image->img_name}}" class="pro_bg">
                    @endif

                    @if($image->icon_name=="noimagepng.png")
                    <img src="{{ asset('/img/noimagepng.png') }}" class="pro_icon">
                    @else
                    <img src="{{$image->icon_name}}" class="pro_icon">
                    @endif
               </div>
               <div class="edit">
                    <button id="edit_button">プロフィールを編集する</button>
               </div>
               <div class="pro_content">
                    <div class="users">
                         <p>{{$user->name}}</p>
                         <p>{{$user->email}}</p>
                         <p>{{$user->coment}}</p>
                    </div>
                    <button id="record_button"><a href="/chart" id="record">学習記録</a></button>
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
                    <p>{{$study->memo}}</p>
               </div>
          </div>
          @endforeach
     </div>

     <div id="edit">
          <form action="edit/{{$user->id}}" method="post" enctype="multipart/form-data">
          @csrf
               <label for="edit_name">名前</label><input id="edit_name" type="text" name="name" value="{{$user->name}}">
               <label for="edit_coment">自己紹介</label><input id="edit_coment" type="text" name="coment" value="{{$user->coment}}">
               <label for="edit_coment">ホーム画像</label><input id="edit_img" type="file" name="pro_img" accept="image/*">
               <img id="img_preview" class="pro_bg">
               <label for="edit_coment">アイコン画像</label><input id="edit_icon" type="file" name="pro_icon" accept="image/*">
               <img id="icon_preview">
               <input type="submit" value="保存">
          </form>
     </div>

     <div class="black_filter"></div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="{{ asset('js/profile.js') }}"></script>
</body>
</html>
