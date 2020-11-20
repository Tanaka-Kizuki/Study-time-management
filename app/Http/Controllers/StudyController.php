<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Study;

class StudyController extends Controller
{
    public function index() {
        return view('index');
    }

    public function start() {
        $oldstudy = Study::orderBy('id','desc')->first();
        if($oldstudy) {
            if($oldstudy->finish) {
                $study = Study::create([
                    'start' => Carbon::now(),
                ]);
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            $study = Study::create([
                'start' => Carbon::now(),
            ]);
            return redirect()->back();
        }
    }

    public function finish() {
        $oldstudy = Study::orderBy('id','desc')->first();
        $date = Carbon::now();
        $day = $date ->format('Y年m月d日');

        if($oldstudy) {
            if($oldstudy->finish) {
                return redirect()->back();
            } elseif($oldstudy->start) {
                $start = new Carbon($oldstudy->start);
                $finish = Carbon::now();
                $todalTime = $start->diffInMinutes($finish);
                $totalTimeHours = ceil($todalTime / 15) * 0.25;

                $oldstudy->update([
                    'finish' => $finish,
                    'totaltime' => $totalTimeHours,
                    'today' => $day,
                ]);
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
