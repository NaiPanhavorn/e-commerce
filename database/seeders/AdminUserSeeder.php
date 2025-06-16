<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com', // ✅ default email
            'password' => Hash::make('admin123'), // ✅ default password
            'role' => 'admin', // ✅ must match your roles logic
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

