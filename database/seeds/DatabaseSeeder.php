<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            AdopterTypesTableSeeder::class,
            TechnologyCategoriesTableSeeder::class,
            IndustriesTableSeeder::class,
            SectorsTableSeeder::class,
            AdoptersTableSeeder::class,
            CommoditiesTableSeeder::class,
            TechnologiesTableSeeder::class,
            AgenciesTableSeeder::class,
            GeneratorsTableSeeder::class,
            UsersSeeder::class,
            FieldsSeeder::class,
            HeaderSeeder::class,
            CarouselSeeder::class,
            LandingPagesSeeder::class,
        ]);
    }
}
