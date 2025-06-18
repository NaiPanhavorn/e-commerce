<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
{
    // Prevent duplicate admin user
    if (!DB::table('users')->where('email', 'admin@gmail.com')->exists()) {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234'),
            'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    // Call other seeders
    $this->call([
        UsersTableSeeder::class,
        ProductsTableSeeder::class,
        TransactionsTableSeeder::class,
        TransactionItemsTableSeeder::class,
        AdminsTableSeeder::class,
    ]);
}

}
