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
        $admin = new User();
        $admin->name = 'Admin';
        $admin->username = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->email_verified_at = date('Y-m-d H:i:s');
        $admin->password = bcrypt('123123');
        $admin->role = 'admin';
        $admin->save();
    }
}
