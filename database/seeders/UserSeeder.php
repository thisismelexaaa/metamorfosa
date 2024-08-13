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
            'jenis_kelamin' => 'computer',
        ]);

        // Create 5 Support Teachers
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "Support Teacher $i",
                'username' => "support_teacher_$i",
                'email' => "support_teacher$i@domain.com",
                'email_verified_at' => now(),
                'password' => bcrypt('123123'),
                'role' => '2',
                'jenis_kelamin' => 'computer',
            ]);
        }

        // Create 2 Staff
        for ($i = 1; $i <= 2; $i++) {
            User::create([
                'name' => "Staff $i",
                'username' => "staff_$i",
                'email' => "staff$i@domain.com",
                'email_verified_at' => now(),
                'password' => bcrypt('123123'),
                'role' => '3',
                'jenis_kelamin' => 'computer',
            ]);
        }

        // Create 1 Receptionist
        User::create([
            'name' => 'Receptionist',
            'username' => 'receptionist',
            'email' => 'receptionist@domain.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'role' => '4',
            'jenis_kelamin' => 'computer',
        ]);

        // Create 3 Officials
        for ($i = 1; $i <= 3; $i++) {
            User::create([
                'name' => "Official $i",
                'username' => "official_$i",
                'email' => "official$i@domain.com",
                'email_verified_at' => now(),
                'password' => bcrypt('123123'),
                'role' => '5',
                'jenis_kelamin' => 'computer',
            ]);
        }
    }
}
