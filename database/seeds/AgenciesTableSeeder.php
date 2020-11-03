<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencies')->insert([
            'name' => 'DD Agency',
            'region' => 'Region 4A',
            'approved' => 2,
            'province' => null,
            'municipality' => null,
            'district' => null,
            'phone' => '09612345678',
            'fax' => '(049) 536-5282',
            'email' => 'dd_agency@gmail.com',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'F. Tale Inc.',
            'region' => 'Region 4A',
            'approved' => 2,
            'province' => null,
            'municipality' => null,
            'district' => null,
            'phone' => '1235',
            'fax' => '(049) 536-1235',
            'email' => 'f_tale@gmail.com',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
