<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Chart</title>
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('/css/welcom.css')}}">
     <link href="{{ asset('css/user.css') }}" rel="stylesheet">
     <link href="{{ asset('css/chart.css') }}" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
</head>
<body>
     <div class="header">
          <a class="header_logo" href="/home">StudyShear</a>
          <nav class="header_left">
               <ul>
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
          <h1 id="title">学習記録</h1>
          <div class="search">
               <form action="/chart" method="post">
               @csrf
                    <input type="date" name="start" value="{{ $start }}"> ~ 
                    <input type="date" name="finish" value="{{ $finish }}">
                    <input type="submit" value="検索">
               </form>
          </div>
          <canvas id="myChart"></canvas>
     </div>
     <script>
          var ctx = document.getElementById("myChart");
          var myLineChart = new Chart(ctx, {
          type: 'line',
          data: {
               labels: @json($lavel),
               datasets: [
               {
                    label: '時間/回',
                    data: @json($time),
                    borderColor: "rgba(255,0,0,1)",
                    backgroundColor: "rgba(0,0,0,0)"
               },
               {
                    label: 'トータル時間',
                    data: @json($totalTime),
                    borderColor: "rgba(0,0,255,1)",
                    backgroundColor: "rgba(0,0,0,0)"
               }
               ],
          },
          options: {
               title: {
               display: true,
               text: ''
               },
               scales: {
               yAxes: [{
                    ticks: {
                    suggestedMax: 50,
                    suggestedMin: 0,
                    stepSize: 10,
                    callback: function(value, index, values){
                    return  value +  '時間'
                    }
                    }
               }]
               },
          }
          });
     </script>
</body>
</html>
