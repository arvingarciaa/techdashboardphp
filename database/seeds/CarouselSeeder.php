<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carousel_items')->insert([
            'title' => "DOST-PCAARRD program distributes duck eggs; supplements duck farmers' livelihood",
            'subtitle' => 'Addressing the impact of COVID-19 pandemic in the country, the Philippine Council for Agriculture, Aquatic and Natural Resources Research and Development of the Department of Science and Technology (DOST-PCAARRD) launches its initiative on “Manok at Itlog sa Pamayanan,” which is one of the subcomponents of “Pagkain at Kabuhayan” under the GALING-PCAARRD Kontra Covid-19 program.',
            'banner' => '5f62b0dd1b673IP-Kayumanggi1.jpg',
            'button_link' => 'http://www.pcaarrd.dost.gov.ph/home/portal/index.php/quick-information-dispatch/3661-dost-pcaarrd-program-distributes-duck-eggs-supplements-duck-farmers-livelihood',
            'position' => 1,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
