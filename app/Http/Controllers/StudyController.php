<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Study;
use App\Book;
use App\User;
use Auth;

class StudyController extends Controller
{
    public function index() {
        $user = User::all();
        $params = Study::all();
        $login = Auth::user();
        return view('index',['params' => $params,'user' => $user,'login' => $login]);
    }

    public function startRecord() {
        $books = Book::all();
        return view('record',['books' => $books]);
    }

    public function start(Request $request) {
        $subject = Book::where('id',$request->book_id)->first();
        $oldstudy = Study::orderBy('id','desc')->first();
        $start = Carbon::now();
        $day = $start ->format('Y年m月d日');
        if($oldstudy) {
            if($oldstudy->finish) {
                $study = Study::create([
                    'user_id' => Auth::id(),
                    'book_id' => $request->book_id,
                    'start' => $start,
                    'time_start'=> $start->format('H時i分'),
                    'status' => '勉強中',
                    'today' => $day,
                    'subject' => $subject->title
                ]);
                return redirect('/');
            } else {
                return redirect('/');
            }
        } else {
            $study = Study::create([
                'user_id' => Auth::id(),
                'book_id' => $request->book_id,
                'start' => $start,
                'time_start'=> $start->format('H時i分'),
                'status' => '勉強中',
                'today' => $day,
                'subject' => $subject->title,
            ]);
            return redirect('/');
        }
    }

    public function finishRecord() {
        return view('finish');
    }

    public function finish(Request $request) {
        $oldstudy = Study::orderBy('id','desc')->first();
        $start = new Carbon($oldstudy->start);
        $finish = Carbon::now();
        $todalTime = $start->diffInMinutes($finish);
        $totalTimeHours = ceil($todalTime / 15) * 0.25;

        if($oldstudy) {
            if($oldstudy->finish) {
                return redirect()->back();
            } elseif($oldstudy->start) {
                $oldstudy->update([
                    'finish' => $finish,
                    'time_finish'=> $finish->format('H時i分'),
                    'totaltime' => $totalTimeHours,
                    'memo' => $request->memo,
                    'status' => '勉強終了!!!'
                ]);
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function book(Request $request) {
        $books = Book::where('user_id',$request->id)->get();
        return view('book',['books'=>$books]);
    }

    public function bookadd(Request $request) {
        $user = Auth::user();
        $book = Book::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'image' => $request->cover
        ]);
        return redirect('/');
    }
}
