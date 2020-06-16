<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TechnologyCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('technology_categories')->insert([
            'name' => 'Products or processes having the commodity as one of the components',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('technology_categories')->insert([
            'name' => 'Machinery and operating systems',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('technology_categories')->insert([
            'name' => 'Commodity processing, its fractions & derivatives',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('technology_categories')->insert([
            'name' => 'Commodity growth promotion & protection, Genetic Engineering',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('technology_categories')->insert([
            'name' => 'Commodity by-product utilizationn or waste treatment/treatment',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('technology_categories')->insert([
            'name' => 'Support to Environmental Management',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
