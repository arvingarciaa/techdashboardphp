<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommoditiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commodities')->insert([
            'name' => 'Abaca',
            'sector_id' => '1',
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('commodities')->insert([
            'name' => 'Goat',
            'sector_id' => '2',
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('commodities')->insert([
            'name' => 'Jackfruit',
            'sector_id' => '1',
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('commodities')->insert([
            'name' => 'Swine',
            'sector_id' => '2',
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
