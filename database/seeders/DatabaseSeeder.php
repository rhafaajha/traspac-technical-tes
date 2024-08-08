<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AgamaSeeder::class,
            PangkatSeeder::class,
            UnitKerjaSeeder::class,
            ArtikelSeeder::class,
            UserSeeder::class,
        ]);
    }
}
