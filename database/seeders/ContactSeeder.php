<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Contact::create([
                'name' => fake()->name(),
                'email' => fake()->email(),
                'message' => fake()->paragraph(),
                'is_read' => fake()->boolean()
            ]);
        }
    }
}
