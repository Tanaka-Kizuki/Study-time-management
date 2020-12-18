<!DOCTYPE html>
<html lang="{ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/welcom.css')}}">
        <style>
            body {
                background-image: url({{ asset('/img/welcome.jpg') }});
            }
        </style>
    </head>
    <body>
        <div class="header">
            <a class="header_logo" href="/home">StudyShear</a>
            
            <nav class="header_left">
                <ul>
                    <li><a href="/">Home</a></li>
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
        <div class="contents">
            <h1 class="title">Study</h1>
            <a class="login btn" href="/login">Login</a>
            <a class="register btn" href="/register">Register</a>
        </div>
        
    </body>
</html>
