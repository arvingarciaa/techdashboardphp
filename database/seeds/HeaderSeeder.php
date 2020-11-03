<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('header_links')->insert([
            'name' => 'Home',
            'link' => 'http://aanr.ph/en/',
            'position' => '1',
            'default' => '1',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('header_links')->insert([
            'name' => 'FIESTA',
            'link' => 'http://167.71.210.45/',
            'position' => '2',
            'default' => '1',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('header_links')->insert([
            'name' => 'Technology',
            'link' => 'http://167.71.210.45:8081/',
            'position' => '3',
            'default' => '1',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('header_links')->insert([
            'name' => 'Community',
            'link' => 'http://167.71.210.45:8080/',
            'position' => '4',
            'default' => '1',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('header_links')->insert([
            'name' => 'eLib',
            'link' => 'https://elibrary.pcaarrd.dost.gov.ph/slims/Main',
            'position' => '5',
            'default' => '1',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
