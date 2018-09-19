<?php

namespace App\Http\Controllers;

use App\Models\LotteryPrize;
use App\Models\Prize;
use Illuminate\Http\Request;

class LotteryPrizeController extends Controller
{
    protected function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }

    public function index()
    {
        $result = LotteryPrize::all();

        foreach($result as &$item) {
            $item->prize = $item->prize;
        }
        return response()->json($result);
    }

    public function randomPrizes()
    {
        $lotteryPrizes = LotteryPrize::all();
        
        $threeDigits = $this->UniqueRandomNumbersWithinRange(0, 999, 7);
        $twoDigits = $this->UniqueRandomNumbersWithinRange(0, 99, 1);

        $lotteryPrizes[1]->number = $threeDigits[1];
        $lotteryPrizes[1]->save();

        for ($i=0; $i<7; $i++){
            $lotteryPrizes[$i]->number = sprintf( "%03d", $threeDigits[$i]);
            $lotteryPrizes[$i]->save();
        }

        $nearbyFirstPrize_1 = $threeDigits[0] == 0? 2 : $threeDigits[0] - 1;
        $nearbyFirstPrize_2 = $threeDigits[0] + 1;

        $lotteryPrizes[7]->number = sprintf( "%02d", $nearbyFirstPrize_1);
        $lotteryPrizes[7]->save();
        $lotteryPrizes[8]->number = sprintf( "%02d", $nearbyFirstPrize_2);
        $lotteryPrizes[8]->save();
        $lotteryPrizes[9]->number = sprintf( "%02d", $twoDigits[0]);
        $lotteryPrizes[9]->save();

        return $this->index();
    }

    public function SearchPrize($number) {
        $result = '';
        if ($number == 'x') return $result;
        
        $threeDigit = substr($number,-3);
        $twoDigit = substr($number,-2);
        $twoDigitPrize = LotteryPrize::findOrFail(10);
        
        if($twoDigit == $twoDigitPrize->number) {
            $result .= $twoDigitPrize->prize->prize_name;
        }

        $threeDigitPrize = LotteryPrize::where('number',$threeDigit)->first();
        if(!empty($threeDigitPrize) && ($threeDigitPrize->id != '10')) {
            $result .= $result == ''? '': ' และ ';
            $result .= $threeDigitPrize->prize->prize_name;
        }

        $result = $result == ''? $number . ' ไม่ถูกรางวัลใดเลย' : $number . ' ถูก' . $result;

        return $result;
    }

}
