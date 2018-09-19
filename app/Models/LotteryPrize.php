<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LotteryPrize extends Model
{
    public $timestamps = false;
    public function prize()
    {
        return $this->belongsTo('App\Models\Prize');
    }
}
