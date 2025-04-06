<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create additional random users
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->email(),
                'password' => Hash::make('password'),
                'email_verified_at' => now()
            ]);
        }
    }
}
