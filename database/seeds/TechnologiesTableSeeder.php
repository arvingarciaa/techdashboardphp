<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('technologies')->insert([
            'name' => 'Goat Semen Extender (A Process of Cryopreserving Goat Sperm Cells using Soy Bean Lecithin Based Semen Extender)',
            'description' => 'The formulation produced is a refinement to the existing goat semen extender intended for artificial insemination. Goat sperm cell is characterized as unique to the other livestock sperm cells, in terms of its reaction to the egg yolk. Semen diluents used in processing commonly contain egg yolk as a protection against cold and freezing related damages to the sperm cells. This utility model is comprise of buffer solution, non-penetrating cryoprotectant and penetrating cryoprotectant. The non-penetrating cryoprotectant is a plant based lecithin from soybean to avoid the interaction of the sperm cells and enzyme from the egg yolk. In this case, more sperm cells is ensured alive once introduced into the reproductive tract of the doe. The diluted semen is pack in semen straws and incubated at 5°C for four (4) hours. After the incubation period, the semen is slowly plunged into the liquid nitrogen tank. In the assessment of the post-thaw motility of the spermatozoa shows that it increase from 30% to 50%.',
            'region' => 'NCR',
            'province' => 'Metro Manila',
            'municipality' => 'Pasig City',
            'year_developed' => '2012',
            'is_trade_secret' => null,
            'protection_type' => null,
            'user_id' => '1',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
