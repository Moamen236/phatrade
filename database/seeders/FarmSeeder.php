<?php

namespace Database\Seeders;

use App\Models\Farm;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Farm::create([
                'name' => fake()->company() . ' Farm',
                'description' => fake()->paragraph(),
                'image_path' => 'uploads/farms/' . fake()->lexify(str_repeat('?', 40)) . '.jpg',
            ]);
        }
    }
}
