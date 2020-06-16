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
            FundingTypesTableSeeder::class,
            AdopterTypesTableSeeder::class,
            ProtectionTypesTableSeeder::class,
            TechnologyCategoriesTableSeeder::class,
            IndustriesTableSeeder::class,
            SectorsTableSeeder::class,
            AdoptersTableSeeder::class,
            PotentialAdoptersTableSeeder::class,
            CommoditiesTableSeeder::class,
        ]);
    }
}
