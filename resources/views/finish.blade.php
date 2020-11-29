<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('/css/finish.css')}}">
     <title>Document</title>
</head>
<body>
     <div class="container">
          <h3>Memo</h3>
          <form action="/finish">
          @csrf
               <textarea name="memo"></textarea>
               <button>Finish</button>
          </form>
     </div>
</body>
</html>