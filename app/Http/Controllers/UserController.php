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
        $image = Image::where('user_id',$id)->first();
        if(!$image) {
            $image = new Image;
            $image->user_id = $id;
            $image->save();
        }
        $studies = Study::where('user_id',$id)->get();
        return view('user',['user'=>$user,'studies' =>$studies,'book'=>$book,'image'=>$image]);
    }

    public function edit($id,Request $request) {
        $img = Image::where('user_id',$id)->first();
        if ($request->pro_img) {
            $image = $request->file('pro_img')->store('public/image');
            $image = str_replace('public/image/', '', $image);
            $img->img_name = $image;
        }
        if ($request->pro_icon) {
            $icon = $request->file('pro_icon')->store('public/image');
            $icon = str_replace('public/image/', '', $icon);
            $img->icon_name = $icon;
        }
        $img->save();

        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->coment = $request->coment;
        $user->save();

        return redirect()->back();
    }
}
