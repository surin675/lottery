<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    public $timestamps = false;
    public function lotteryPrizes()
    {
        return $this->hasMany('App\Models\LotteryPrize');
    }
}
