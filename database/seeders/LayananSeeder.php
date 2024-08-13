<?php

namespace Database\Seeders;

use App\Models\Panel\Layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 5 Layanan
        for ($i = 1; $i <= 5; $i++) {
            Layanan::create([
                'layanan' => 'Layanan ' . $i,
                'status' => 1
            ]);
        }
    }
}
