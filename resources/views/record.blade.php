<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
     <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
     <div class="form">
          <form action="/start">
          @csrf
              <input type="text" name="subject">
              <button>Let's Study</button>
          </form>
          <a href="/finish">Finish Study</a>
     </div> 
     <div id="app">
        <booksearch-component></booksearch-component>
    </div>
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>