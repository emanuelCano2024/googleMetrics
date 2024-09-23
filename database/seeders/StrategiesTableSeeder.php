<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class StrategiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('strategies')->insert([
            ['name' => 'DESKTOP'],
            ['name' => 'MOBILE'],
        ]);
    }
}