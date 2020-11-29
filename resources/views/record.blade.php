<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('/css/record.css')}}">
     <title>Document</title>
</head>
<body>
     <div class="form">
          <form action="/start">
               @csrf
               <div class="box">
                    <div class="item">
                         <input type="checkbox" value="" name="book_id" >書籍なしで勉強する
                         <input type="text" name="subject" placeholder="勉強内容を記載">
                         <img src="{{ asset('/img/noimagepng.png') }}">
                    </div>
                    @foreach($books as $book)
                    <div class="item">
                         <div class="title">
                              <input type="checkbox" value="{{$book->id}}" name="book_id">
                              <p>{{$book->title}}</p>
                         </div>
                         <img src="{{$book->image}}">
                    </div>
                    @endforeach
                    <div class="item">
                         <div class="item_inner">
                              <p>書籍追加</p>
                              <a href="/book?id={{$user->id}}"><img class="plus" src="{{ asset('/img/plus.svg')}}"></a>
                         </div>
                    </div>
               </div>
               <button>Let's Study</button>
          </form>
     </div>
</body>
</html>