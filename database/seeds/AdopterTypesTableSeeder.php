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
            'user_id' => 1,
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Fisherfolks',
            'user_id' => 1,
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Manufacturers',
            'user_id' => 1,
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Government',
            'user_id' => 1,
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Regulatory bodies',
            'user_id' => 1,
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Seed companies',
            'user_id' => 1,
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Food producers',
            'user_id' => 1,
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Feed producers',
            'user_id' => 1,
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopter_types')->insert([
            'name' => 'Others',
            'user_id' => 1,
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
