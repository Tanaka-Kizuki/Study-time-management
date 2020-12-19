<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>How</title>
     <link rel="stylesheet" href="{{ asset('/css/welcom.css')}}">
     <link rel="stylesheet" href="{{ asset('/css/index.css')}}">
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
                            <!-- <a>
                                {{ Auth::user()->name }}
                            </a> -->

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
                    @endguest
                </ul>
          </nav>
     </div>
</body>
</html>