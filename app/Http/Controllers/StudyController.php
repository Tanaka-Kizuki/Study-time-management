<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Study;

class StudyController extends Controller
{
    public function index() {

        $params = Study::all();
        return view('index',['params' => $params]);
    }

    public function start(Request $request) {
        $oldstudy = Study::orderBy('id','desc')->first();
        $start = Carbon::now();
        $day = $start ->format('Y年m月d日');
        if($oldstudy) {
            if($oldstudy->finish) {
                $study = Study::create([
                    'start' => $start,
                    'time_start'=> $start->format('h時i分'),
                    'status' => '勉強中',
                    'today' => $day,
                    'subject' => $request->subject
                ]);
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            $study = Study::create([
                'start' => $start,
                'time_start'=> $start->format('h時i分'),
                'status' => '勉強中',
                'today' => $day,
                'subject' => $request->subject,
            ]);
            return redirect()->back();
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
                    'time_finish'=> $finish->format('h時i分'),
                    'totaltime' => $totalTimeHours,
                    'status' => '勉強終了!!!'
                ]);
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
