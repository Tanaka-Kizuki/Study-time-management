<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Study;
use Auth;

class LikeController extends Controller {
     public function firstcheck($post) {
          $user = Auth::user();
          $likes = new Like();
          $like = Like::where('posts_id',$post)->where('user_id',$user->id)->first();
          if($like) {
               $count = $likes->where('posts_id',$post)->where('like',1)->count();
               return [$like->like,$count];
          } else {
               $like = $likes->create([
                    'user_id' => $user->id,
                    'posts_id' => $post,
                    'like' => 0
               ]);
               $count = $likes->where('posts_id',$post)->where('like',1)->count();
               return [$like->like,$count];
          }
     }
     
     public function check($post) {
          $user = Auth::user();
          $likes = new Like();
          $like = Like::where('posts_id',$post)->where('user_id',$user->id)->first();
          if($like->like == 1) {
               $like->like = 0;
               $like->save();
               $count = $likes->where('posts_id',$post)->where('like',1)->count();
               return [$like->like,$count];
          } else {
               $like->like = 1;
               $like->save();
               $count = $likes->where('posts_id',$post)->where('like',1)->count();
               return [$like->like,$count];
          };
     }

     public function like($post) {
          $likes = new Like();
          $like = $likes->where('post_id',$post)->where('like',1)->get();
     }
}
