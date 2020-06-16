<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdopterTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adopter_types')->insert([
            'name' => 'Farmers',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Fisherfolks',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Manufacturers',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Government',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Regulatory bodies',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Seed companies',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Food producers',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Feed producers',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Others',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
