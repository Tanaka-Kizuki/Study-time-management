<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Study;
use App\Book;
use App\Image;
use Auth;

class UserController extends Controller
{
    public function index($id) {
        $user = Auth::user();
        $book = Book::all();
        $studies = Study::where('user_id',$id)->get();
        return view('user',['user'=>$user,'studies' =>$studies,'book'=>$book]);
    }

    public function edit($id,Request $request) {
        $image = $request->file('pro_img')->store('public/img');

        $image = str_replace('public/image/', '', $image);
        $img = new Image;
        $img->file_name = $image;
        $img->user_id = $id;
        $image->save();
        return redirect('/user/$id');
    }
}
