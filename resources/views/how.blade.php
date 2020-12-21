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
    <div class="container">
        <h1>使用方法</h1>
        <ul>
            <li class="how_item">
                <h2>1.使用教材の登録</h2>
                <ul>
                    <li>
                        <p>①ホーム画面の書籍登録ボタンをクリック</p>
                        <img src="{{ asset('/img/book.jpg') }}" >
                    </li>
                    <li>
                        <p>②書籍裏に記載のISBNコードを入力し登録ボタンを押す</p>
                        <img src="{{ asset('/img/book2.png') }}" >
                    </li>
                </ul>
            </li>
            <li class="how_item">
                <h2>2.学習記録（開始）</h2>
                <ul>
                    <li>
                        <p>①ホーム画面STARTボタンをクリック</p>
                        <img src="{{ asset('/img/homestart.jpg') }}" >
                    </li>
                    <li>
                        <p>②登録した書籍もしくは書籍選択せず内容を記入しLet's STARTボタンをクリック</p>
                        <img src="{{ asset('/img/start.png') }}" >
                    </li>
                </ul>
            </li>
            <li class="how_item">
                <h2>2.学習記録（終了）</h2>
                <ul>
                    <li>
                        <p>①ホーム画面FINISHボタンをクリック</p>
                        <img src="{{ asset('/img/homefinish.jpg') }}" >
                    </li>
                    <li>
                        <p>②メモを記入し、Finishボタンをクリック</p>
                        <img src="{{ asset('/img/finish.png') }}" >
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</body>
</html>