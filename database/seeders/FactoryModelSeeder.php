<?php

namespace Database\Seeders;

use App\Models\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FactoryModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Factory::create([
                'name' => fake()->company(),
                'description' => fake()->paragraph(),
                'images' => collect(range(0, 2))->map(function ($order) {
                    return [
                        'path' => 'uploads/factories/' . fake()->lexify(str_repeat('?', 40)) . '.jpg',
                        'order' => $order,
                    ];
                })->toJson(),
            ]);
        }
    }
}
