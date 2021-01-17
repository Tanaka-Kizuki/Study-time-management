<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <div>
          <h1>Liked</h1>
          @if($param)
               @for($i=0; count($param) > $i ;$i++)
                    <h1>{{$param[$i]}}</h1>
               @endfor
          @endif
     </div>
</body>
</html>