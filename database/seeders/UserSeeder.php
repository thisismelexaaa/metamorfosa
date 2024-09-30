<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 1 Admin
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'role' => 'admin',
            'status' => 1,
            'alamat' => 'Jl. ABC 1234',
            'jenis_kelamin' => 'computer',
        ]);

        // Create 5 Support Teachers
        // for ($i = 1; $i <= 5; $i++) {
        //     User::create([
        //         'name' => "Support Teacher $i",
        //         'username' => "support_teacher_$i",
        //         'email' => "support_teacher$i@domain.com",
        //         'email_verified_at' => now(),
        //         'password' => bcrypt('123123'),
        //         'role' => '2',
        //         'status' => 1,
        //         'alamat' => 'Jl. ABC 1234',
        //         'jenis_kelamin' => rand(1, 2),
        //     ]);
        // }

        // User::create([
        //     'name' => "Staff",
        //     'username' => "staff",
        //     'email' => "staff@domain.com",
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('123123'),
        //     'role' => '3',
        //     'status' => 1,
        //     'alamat' => 'Jl. ABC 1234',
        //     'jenis_kelamin' => rand(1, 2),
        // ]);

        // User::create([
        //     'name' => 'Receptionist',
        //     'username' => 'receptionist',
        //     'email' => 'receptionist@domain.com',
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('123123'),
        //     'role' => '4',
        //     'status' => 1,
        //     'alamat' => 'Jl. ABC 1234',
        //     'jenis_kelamin' => rand(1, 2),
        // ]);

        // User::create([
        //     'name' => "Official",
        //     'username' => "official",
        //     'email' => "official@domain.com",
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('123123'),
        //     'role' => '5',
        //     'status' => 1,
        //     'alamat' => 'Jl. ABC 1234',
        //     'jenis_kelamin' => rand(1, 2),
        // ]);
    }
}
