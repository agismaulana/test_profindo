<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ApotekerSeeder::class);
        $this->call(ObatSeeder::class);
        $this->call(TransaksiObatKeluarSeeder::class);
        $this->call(UserSeeder::class);
    }
}
