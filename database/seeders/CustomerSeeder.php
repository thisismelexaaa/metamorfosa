<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('customers')->insert([
                'name' => $faker->name,
                'no_daftar' => $faker->randomNumber(5),
                'no_tlp' => $faker->phoneNumber,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tgl_lahir' => $faker->date(),
                'alamat' => $faker->address,
                'nama_ayah' => $faker->name('male'),
                'pekerjaan_ayah' => $faker->jobTitle,
                'nama_ibu' => $faker->name('female'),
                'pekerjaan_ibu' => $faker->jobTitle,
                'status' => $faker->randomElement([1, 2]),
            ]);
        }
    }
}
