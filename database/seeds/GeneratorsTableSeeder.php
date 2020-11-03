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
            'name' => 'Generator',
            'agency_id' => '1',
            'approved' => 2,
            'address' => 'Bay, Laguna',
            'phone' => '0915353462',
            'fax' => '508-1523',
            'email' => 'generator@gmail.com',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
