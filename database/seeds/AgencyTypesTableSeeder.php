<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AgencyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agency_types')->insert([
            'name' => 'Agency Type 1',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agency_types')->insert([
            'name' => 'Agency Type 2',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agency_types')->insert([
            'name' => 'Agency Type 3',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
