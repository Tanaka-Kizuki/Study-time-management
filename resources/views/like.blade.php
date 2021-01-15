<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <div>
          @foreach($user as $users)
               <ul>
                    <li>{{$user->name}}</li>
               </ul>
          @endforeach
     </div>
</body>
</html>