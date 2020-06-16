<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdoptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adopters')->insert([
            'name' => 'Shannon Cabana',
            'adopter_type_id' => '1',
            'address' => 'Unisan, Quezon',
            'phone' => '09098765432',
            'fax' => null,
            'email' => 'scabana@gmail.com',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopters')->insert([
            'name' => 'Leo Gudito',
            'adopter_type_id' => '2',
            'address' => 'Bay, Laguna',
            'phone' => '09123456789',
            'fax' => null,
            'email' => 'lgudito@yahoo.com',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('adopters')->insert([
            'name' => 'Blaise Fuentes',
            'adopter_type_id' => '4',
            'address' => 'Metro Manila',
            'phone' => '09141235678',
            'fax' => null,
            'email' => 'bfuentes@hotmail.com',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
