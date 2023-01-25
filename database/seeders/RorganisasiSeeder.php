<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rorganisasi;
use Faker\Factory as Faker;

class RorganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 12; $i++) { 
            $data = [
                'kader_pkk_id' => $faker->numberBetween($min = 0, $max = 1000),
                'tahun_mulai' => $faker->year,
                'tahun_selesai' => $faker->year,
                'nama_organisasi' => $faker->company,
                'jabatan' => $faker->jobTitle,
                'kota' => $faker->city,
                'deskripsi' => $faker->sentence,
                'created_by' => $faker->name,
            ];
    
            Rorganisasi::create($data);
        }
    }
}
