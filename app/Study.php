<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $fillable = [
        'user_id','start', 'finish', 'totaltime','today','status','subject','time_start','time_finish','memo','book_id'
    ];
}
