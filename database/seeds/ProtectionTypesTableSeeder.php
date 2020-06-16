<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProtectionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('protection_types')->insert([
            'name' => 'Trade Secret',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('protection_types')->insert([
            'name' => 'Patent',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('protection_types')->insert([
            'name' => 'Utility Model',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('protection_types')->insert([
            'name' => 'Industrial Design',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('protection_types')->insert([
            'name' => 'Copyright',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('protection_types')->insert([
            'name' => 'Plant Variety Protection',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
