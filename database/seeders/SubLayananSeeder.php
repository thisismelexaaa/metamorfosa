<?php

namespace Database\Seeders;

use App\Models\Panel\SubLayanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class SubLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 5; $i++) {
            $harga = 50000;
            if ($i == 1) {
                $harga += 25000;
            } else if ($i == 2) {
                $harga += 50000;
            } else if ($i == 3) {
                $harga += 75000;
            } else if ($i == 4) {
                $harga += 100000;
            } else if ($i == 5) {
                $harga += 125000;
            };
            for ($j = 1; $j <= 5; $j++) {

                SubLayanan::create([
                    'id_layanan' => $i,
                    'sub_layanan' => 'Sub Layanan ' . $j,
                    'harga' => $harga,
                    'status' => 1
                ]);
            }
        }
    }
}
