<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="{{ asset('css/like.css') }}" rel="stylesheet">
</head>
<body>
     <div class="content">
          <a class="back" href="/home">×</a>
          <h1>Liked</h1>
          @if($param)
               @for($i=0; count($param) > $i ;$i++)
               <div class="liked">
                    <img src="{{asset('storage/image/'.$icon[$i]->icon_name)}}" class="pro_icon">
                    <div class="name">{{$param[$i]->name}}</div>
               </div>
               @endfor
          @endif
     </div>
     <div class="black_filter action"></div>
</body>
</html>
