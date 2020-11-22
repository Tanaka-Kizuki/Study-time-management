<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $fillable = [
        'start', 'finish', 'totaltime','today','status','subject'
    ];
}
