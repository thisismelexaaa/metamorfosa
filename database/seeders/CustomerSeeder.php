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
                // 'layanan' => $faker->randomElement([1, 2, 3]), // Sesuaikan dengan ID layanan yang ada di database Anda
                // 'sub_layanan' => $faker->randomElement([1, 2, 3]), // Sesuaikan dengan ID sub layanan yang ada di database Anda
                // 'support_teacher' => $faker->randomElement(['support_teacher 1', 'support_teacher 2']),
                // 'tgl_masuk' => $faker->date(),
                // 'tgl_selesai' => $faker->date(),
                // 'status' => $faker->randomElement([1, 2]),
                // 'total_biaya' => $faker->randomFloat(2, 1000, 1000000), // Nilai uang bayar acak antara 1000 dan 1000000
                // 'keluhan' => $faker->sentence,
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ]);
        }
    }
}
