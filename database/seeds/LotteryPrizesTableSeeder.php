<?php

use Illuminate\Database\Seeder;

class LotteryPrizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prize_ids = [1, 2, 2, 2, 3, 3, 3, 4, 4, 5];
        foreach($prize_ids as $prize_id) {
            DB::table('lottery_prizes')->insert([
                'prize_id' => $prize_id
            ]);
        }
    }
}
