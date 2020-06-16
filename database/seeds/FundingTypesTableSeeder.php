<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FundingTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funding_types')->insert([
            'name' => 'Basic Research',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('funding_types')->insert([
            'name' => 'Applied Research',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('funding_types')->insert([
            'name' => 'Product Development',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('funding_types')->insert([
            'name' => 'Commercialization',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('funding_types')->insert([
            'name' => 'DOST-PCAARRD',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
