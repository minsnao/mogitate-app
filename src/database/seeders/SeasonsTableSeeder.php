<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Season;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = ['春', '夏', '秋', '冬'];
        foreach ($seasons as $season) {
            Season::firstOrCreate(['name' => $season]);
        }
        //DB::table('seasons')->insert([
        //    ['name' => '春'],
        //    ['name' => '夏'],
        //    ['name' => '秋'],
        //    ['name' => '冬'],
        //]);
    }
}
