<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Study;
use App\Book;
use App\Image;
use Auth;
use Storage;

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
        $studies = Study::where('user_id',$id)->orderby('id','desc')->get();
        return view('user',['user'=>$user,'studies' =>$studies,'book'=>$book,'image'=>$image]);
    }

    public function edit($id,Request $request) {
        $img = Image::where('user_id',$id)->first();
        if ($request->pro_img) {
            $image = $request->file('pro_img');
            $path = Storage::disk('s3')->putFile('image', $image, 'public');
            $img->img_name =  Storage::disk('s3')->url($path);
            $img->save();
        }
        if ($request->pro_icon) {
            $icon = $request->file('pro_icon');
            $path = Storage::disk('s3')->putFile('image', $icon, 'public');
            $img->icon_name = Storage::disk('s3')->url($path);
            $img->save();
        }
        $img->save();

        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->coment = $request->coment;
        $user->save();

        return redirect()->back();
    }

    public function chart() {
        $id = Auth::id();
        $studies = Study::where('user_id',$id)->get();
        $time = [];
        $lavel = [];
        $total = 0;
        $totalTime = [];
        foreach($studies as $study) {
            $time[] = $study->totaltime;
            $lavel[] = $study->today;
            $total += $study->totaltime;
            $totalTime[] = $total;
        }
        return view('chart',['lavel' => $lavel,'time' => $time,'totalTime' => $totalTime]);
    }
}
