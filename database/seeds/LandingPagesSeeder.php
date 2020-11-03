<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LandingPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('landing_pages')->insert([
            'footer_about' => 'The Technology Transfer and Promotion Division (TTPD) facilitates the transfer of the developed technologies to end users of agriculture, forestry, aquatic and natural resources, as well as the conduct of information dissemination, advocacy and promotion of the same.',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
