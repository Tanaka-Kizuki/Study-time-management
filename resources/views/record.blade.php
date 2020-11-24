<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
<div class="form">
               <form action="/start">
               @csrf
                    <input type="checkbox" value=0 name="book_id">未選択
                    @foreach($books as $book)
                    <input type="checkbox" value="{{$book->id}}" name="book_id">
                    <img src="{{$book->image}}">
                    @endforeach
                    <input type="text" name="subject">
                    <button>Let's Study</button>
               </form>
               <a href="/finish">Finish Study</a>
          </div>
</body>
</html>