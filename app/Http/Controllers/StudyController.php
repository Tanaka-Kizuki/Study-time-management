<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Study;
use App\Book;
use Auth;

class StudyController extends Controller
{
    public function index() {
        $user = Auth::user();
        $params = Study::all();
        return view('index',['params' => $params,'user' => $user]);
    }

    public function record() {
        $books = Book::all();
        return view('record',['books' => $books]);
    }

    public function start(Request $request) {
        $oldstudy = Study::orderBy('id','desc')->first();
        $start = Carbon::now();
        $day = $start ->format('Y年m月d日');
        // var_dump(Auth::id());
        // exit();
        if($oldstudy) {
            if($oldstudy->finish) {
                $study = Study::create([
                    'user_id' => Auth::id(),
                    'book_id' => $request->book_id,
                    'start' => $start,
                    'time_start'=> $start->format('H時i分'),
                    'status' => '勉強中',
                    'today' => $day,
                    'subject' => $request->subject
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
                'subject' => $request->subject,
            ]);
            return redirect('/');
        }
    }

    public function finish() {
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
                    'status' => '勉強終了!!!'
                ]);
                return redirect()->back();
            }
        } else {
            return redirect('/');
        }
    }

    public function book() {
        $books = Book::all();
        return view('book',['books'=>$books]);
    }

    public function bookadd(Request $request) {
        $book = Book::create([
            'title' => $request->title,
            'image' => $request->cover
        ]);
        return redirect('/book');
    }
}
