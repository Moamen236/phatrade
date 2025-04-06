<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Enums\BannerType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::create([
            'title' => 'Welcome to Phatrade',
            'sub_title' => 'ALL PRODUCTS ARE 100% NATURAL AND PURE',
            'description' => 'One of the main reasons for the success of our company is quality control, research and development.',
            'type' => 'home',
            'image' => 'uploads/banners/' . fake()->lexify(str_repeat('?', 40)) . '.jpg',
        ]);

        Banner::create([
            'title' => 'Quality Essential Oils',
            'sub_title' => 'Experience the finest Egyptian essential oils',
            'description' => 'From farm to bottle, we ensure the highest quality in every product.',
            'type' => 'home',
            'image' => 'uploads/banners/' . fake()->lexify(str_repeat('?', 40)) . '.jpg',
        ]);

        Banner::create([
            'title' => 'About Us',
            'type' => 'about',
            'image' => 'uploads/banners/'. fake()->lexify(str_repeat('?', 40)). '.jpg', 
        ]);

        Banner::create([
            'title' => 'Our Products',
            'type' => 'products',
            'image' => 'uploads/banners/' . fake()->lexify(str_repeat('?', 40)) . '.jpg',
        ]);

        Banner::create([
            'title' => 'Contact Us',
            'type' => 'contact',
            'image' => 'uploads/banners/'. fake()->lexify(str_repeat('?', 40)). '.jpg', 
        ]);

        Banner::create([
            'title' => 'Our Factories',
            'type' => 'factories',
            'image' => 'uploads/banners/'. fake()->lexify(str_repeat('?', 40)). '.jpg', 
        ]);

        Banner::create([
            'title' => 'The Fresh Raw Material',
            'type' => 'farms',
            'description' => 'It is very important in the concrete production field to have fresh raw materials. This is the target of our farm to get very fresh raw materials.Our Farm is supporting our production with critical products like Bitter Orange flowers, Geranium, Basil, Violet for concrete, Bitter orange flowers for pure Neroli oil. Also, we do some agricultural research and trials in our farm.',
            'image' => 'uploads/banners/'. fake()->lexify(str_repeat('?', 40)). '.jpg', 
        ]);
        
        Banner::create([
            'title' => 'Our Certifications',
            'type' => 'certifications',
            'description' => 'PHATRADE maintains the highest standards of quality and compliance in the industry.',
            'image' => 'uploads/banners/'. fake()->lexify(str_repeat('?', 40)). '.jpg', 
        ]);
        

    }
}
