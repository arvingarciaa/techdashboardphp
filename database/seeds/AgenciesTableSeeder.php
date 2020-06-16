<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencies')->insert([
            'name' => 'DD Agency',
            'agency_type_id' => '1',
            'address' => 'Lucena, Quezon',
            'phone' => '09612345678',
            'fax' => 'DD Agency',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'F. Tale Inc.',
            'agency_type_id' => '2',
            'address' => 'Metro Manila',
            'phone' => '12345',
            'fax' => 'None',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'Agriculture Corp.',
            'agency_type_id' => '3',
            'address' => 'Kalibo, Aklan',
            'phone' => '09812345908',
            'fax' => 'None',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'PHILIPPINE NUCLEAR RESEARCH INSTITUTE (PNRI-DOST)',
            'agency_type_id' => '1',
            'address' => 'Quezon City',
            'phone' => '(02) 929 6011',
            'fax' => '(02) 929 6011',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'UNIVERSITY OF THE PHILIPPINES - LOS BAÑOS',
            'agency_type_id' => '1',
            'address' => 'Los Baños, Laguna',
            'phone' => '(049) 536-3229',
            'fax' => '(049) 536-5282',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'VISAYAS STATE UNIVERSITY',
            'agency_type_id' => '1',
            'address' => 'Pangasugan, Baybay City, 6521 Leyte',
            'phone' => '(053) 3352601',
            'fax' => '(053) 3352601',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'CAPIZ STATE UNIVERSITY',
            'agency_type_id' => '1',
            'address' => 'Fuentes Drive, Roxas City, 5800 Capiz',
            'phone' => '(036) 6214337',
            'fax' => '(036) 6214337',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'UNIVERSITY OF SOUTHERN MINDANAO',
            'agency_type_id' => '1',
            'address' => 'Kabacan, Cotabato',
            'phone' => '(064) 572-2138',
            'fax' => '(064) 572-2138',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'METALS INDUSTRY RESEARCH AND DEVELOPMENT CENTER (MIRDC-DOST)',
            'agency_type_id' => '1',
            'address' => 'DOST Complex, Bicutan, Taguig City',
            'phone' => '(02) 837-0431',
            'fax' => '(02) 837-0613',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'CENTRAL MINDANAO UNIVERSITY',
            'agency_type_id' => '1',
            'address' => 'Maramag, Musuna, Bukidnon',
            'phone' => '(0888) 828-7899',
            'fax' => '(0888) 828-7899',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'CENTRAL LUZON STATE UNIVERSITY',
            'agency_type_id' => '1',
            'address' => 'Science City of Muños, Nueva Ecija',
            'phone' => '(044) 456-0107',
            'fax' => '(044) 456-0107',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'BUREAU OF FISHERIES AND AQUATIC RESOURCES',
            'agency_type_id' => '1',
            'address' => 'QUEZON CITY',
            'phone' => '(02) 926-8616',
            'fax' => '(02) 926-8616',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'CAGAYAN STATE UNIVERSITY',
            'agency_type_id' => '1',
            'address' => 'Tuguegarao, Cagayan',
            'phone' => '(078) 844-0430',
            'fax' => '(078) 844-0430',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'UNIVERSITY OF THE PHILIPPINES - MIAG-AO',
            'agency_type_id' => '1',
            'address' => 'Miag-ao, Iloilo',
            'phone' => '(033) 315-8143',
            'fax' => '(033) 315-8143',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('agencies')->insert([
            'name' => 'UNIVERSITY OF THE PHILIPPINES - LOS BAÑOS - BIOTECH (UPLB-BIOTECH)',
            'agency_type_id' => '1',
            'address' => 'Los Baños, Laguna',
            'phone' => '(049) 536-1620',
            'fax' => '(049) 536-2721',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);

    }
}
