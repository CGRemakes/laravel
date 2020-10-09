<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Victory extends Model
{
    protected $fillable = [
        'game_date',
        'byu_score',
        'utah_score',
    ];
}
