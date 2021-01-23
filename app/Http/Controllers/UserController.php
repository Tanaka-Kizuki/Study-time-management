<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Study;
use App\Book;
use Auth;

class UserController extends Controller
{
    public function index($id) {
        $user = Auth::user();
        $book = Book::all();
        $studies = Study::where('user_id',$id)->get();
        return view('user',['user'=>$user,'studies' =>$studies,'book'=>$book]);
    }
}
