<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Set the auto-increment value to start from 15
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 15;');
        
        // Create a user with ID 15 (the next available ID after setting auto-increment)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('test@123'),
        ]);
    }
}
