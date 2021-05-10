<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\{LigaSeeder, ProductSeeder};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductSeeder::class);
        $this->call(LigaSeeder::class);
    }
}
