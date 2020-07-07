<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GeneratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generators')->insert([
            'title' => 'Mr.',
            'name' => 'Generator',
            'agency_id' => '1',
            'availability' => 'Active',
            'expertise' => 'Soil Science',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
