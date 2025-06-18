<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@example.com'], // Check if email exists
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin123'), // Don't hardcode hashed password
                'role' => 'admin',
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Add more unique users here if needed:
        DB::table('users')->updateOrInsert(
            ['email' => 'user1@example.com'],
            [
                'name' => 'User One',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
