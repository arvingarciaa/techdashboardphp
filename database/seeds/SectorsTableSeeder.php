<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sectors')->insert([
            'name' => 'Crops',
            'industry_id' => '1',
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('sectors')->insert([
            'name' => 'Livestock',
            'industry_id' => '1',
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('sectors')->insert([
            'name' => 'Feeds',
            'industry_id' => '1',
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('sectors')->insert([
            'name' => 'Inland Fisheries',
            'industry_id' => '2',
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('sectors')->insert([
            'name' => 'Marine Resources',
            'industry_id' => '2',
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('sectors')->insert([
            'name' => 'Forestry',
            'industry_id' => '3',
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('sectors')->insert([
            'name' => 'Environmental Services',
            'industry_id' => '3',
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
