<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PotentialAdoptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('potential_adopters')->insert([
            'name' => 'Leonora Rodriquez',
            'adopter_type_id' => '1',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('potential_adopters')->insert([
            'name' => 'Michael Vargaz',
            'adopter_type_id' => '8',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('potential_adopters')->insert([
            'name' => 'Dorothy Matapang',
            'adopter_type_id' => '3',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
