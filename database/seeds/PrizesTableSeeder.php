<?php

use Illuminate\Database\Seeder;

class PrizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prize_names = ['รางวัลที่ 1', 'รางวัลที่ 2', 'รางวัลที่ 3', 'รางวัลใกล้เคียงรางวัลที่ 1', 'รางวัลเลขท้าย 2 ตัว'];
        foreach($prize_names as $prize_name) {
            DB::table('prizes')->insert([
                'prize_name' => $prize_name
            ]);
        }
    }
}
