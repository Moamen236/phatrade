<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\BannerSeeder;
use Database\Seeders\ContactSeeder;
use Database\Seeders\FactoryModelSeeder;
use Database\Seeders\FarmSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\SubscriberSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@phatrade.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        $this->call([
            ProductSeeder::class,
            BannerSeeder::class,
            ContactSeeder::class,
            FactoryModelSeeder::class,
            FarmSeeder::class,
            SubscriberSeeder::class,
        ]);
    }
}
