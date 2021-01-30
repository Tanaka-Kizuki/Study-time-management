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
        $image = $request->file('pro_img')->store('public/image');
        $icon = $request->file('pro_icon')->store('public/image');
        $image = str_replace('public/image/', '', $image);
        $icon = str_replace('public/image/', '', $icon);
        $img = new Image;
        $img->img_name = $image;
        $img->icon_name = $icon;
        $img->user_id = $id;
        $image->save();

        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->coment = $request->coment;
        $user->save();

        return redirect('/user/$id');
    }
}
