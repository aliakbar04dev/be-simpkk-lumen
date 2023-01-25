<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RpekerjaanSeeder::class);
        // $this->call(RorganisasiSeeder::class);
        // $this->call(RpelatihanSeeder::class);
        // $this->call(RpengabdianSeeder::class);
        // $this->call(RpenghargaanSeeder::class);
    }
}
