<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Study;
use Auth;

class LikeController extends Controller
{
    public function firstcheck($post) {
        $user = Auth::user();
        $likes = new Like();
        $like = Like::where('posts_id',$post)->where('user_id',$user->id)->first();
        if($like) {
             return $like->like;
        } else {
             $like = $likes->create([
                  'user_id' => $user->id,
                  'posts_id' => $post,
                  'like' => 0
             ]);
   
             return $like->like;
        }
       }
   
       public function check($post) {
        $user = Auth::user();
        $like = Like::where('posts_id',$post)->where('user_id',$user->id)->first();
        if($like->like == 1) {
             $like->like = 0;
             $like->save();
             return $like->like;
        } else {
             $like->like = 1;
             $like->save();
             return $like->like;
        };
       }
}
