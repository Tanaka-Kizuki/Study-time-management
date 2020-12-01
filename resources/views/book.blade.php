<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
     <link rel="stylesheet" href="{{ asset('/css/book.css')}}">
     <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
     <div class="container">
          <div class="inner_container">
               <h1>書籍登録</h1>
               <div id="app">
               <booksearch-component></booksearch-component>
               </div>
               <div class="books">
                    <h1>-本棚-</h1>
                    <div class="item_box">
                    @foreach($books as $book)
                         <div class="item">
                              <img src="{{$book->image}}">
                              <p>{{$book->title}}</p>
                         </div>
                    @endforeach
                    </div>
               </div>
               <a href="/home" class="back">戻る</a>
          </div>
     </div>
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>