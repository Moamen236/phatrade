<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Create categories first
        $categories = [
            ['name' => 'Oils', 'slug' => 'oils', 'description' => 'Oils', 'order' => 1],
            ['name' => 'Concretes', 'slug' => 'concretes', 'description' => 'Concretes', 'order' => 2],
            // ['name' => 'Absolutes', 'slug' => 'absolutes', 'description' => 'Absolutes', 'order' => 3],
            // ['name' => 'Natural Isolates', 'slug' => 'natural-isolates', 'description' => 'Natural Isolates', 'order' => 4],
            // ['name' => 'Essential Oils', 'slug' => 'essential-oils', 'description' => 'Essential Oils', 'order' => 5],
            // ['name' => 'Floral Waters', 'slug' => 'floral-waters', 'description' => 'Floral Waters', 'order' => 6],
            // ['name' => 'Organic Products', 'slug' => 'organic-products', 'description' => 'Organic Products', 'order' => 7]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create products with their respective categories

        $oils = [
            [
                'name' => 'Basil Oil',
                'description' => 'Premium essential oil with minimum 50% Linalool content',
                'category_id' => 1,
                'image_path' => 'uploads/products/iepeibpkalnftygaukkgafijihftogooyvsgszwc.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Chamomile Blue Oil',
                'description' => 'Food Chemical Codex (FCC) grade essential oil',
                'category_id' => 1,
                'image_path' => 'uploads/products/peyrxqyfolacvmzqamvtetruexyylbatsjadxbvs.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Coriander Oil',
                'description' => 'Pure steam-distilled essential oil from coriander seeds',
                'category_id' => 1,
                'image_path' => 'uploads/products/qunrgxqojdmjakdgkdjedivjotmkfmutzopkprlw.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        $concretes = [
            [
                'name' => 'Basil Grand Vert Concrete',
                'description' => 'Premium solvent-extracted concrete from fresh basil leaves',
                'category_id' => 2,
                'image_path' => 'uploads/products/rtwwqmgndzvupdjytgxmutzdmrhjnrppvozudblc.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bitter Orange Flower Concrete',
                'description' => 'Luxurious concrete extracted from fresh neroli blossoms',
                'category_id' => 2,
                'image_path' => 'uploads/products/uqstpwsokqiprbjprrrrxigeuzebkksnmqfsjwiu.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Calendula Carnation Concrete',
                'description' => 'Premium concrete blend of calendula and carnation flowers',
                'category_id' => 2,
                'image_path' => 'uploads/products/zjdyfpuvrzufimqohnllpeybtppoyohdtdjhlnka.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        // $absolutes = [
        //     [
        //         'name' => 'Jasmine Absolute',
        //         'description' => 'Premium absolute extracted from jasmine concrete using alcohol',
        //         'category_id' => 3,
        //         'image_path' => 'uploads/products/iepeibpkalnftygaukkgafijihftogooyvsgszwc.jpg',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'name' => 'Rose Absolute',
        //         'description' => 'Luxury absolute derived from Damascus rose concrete',
        //         'category_id' => 3,
        //         'image_path' => 'uploads/products/iepeibpkalnftygaukkgafijihftogooyvsgszwc.jpg',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'name' => 'Vanilla Absolute',
        //         'description' => 'Premium absolute extracted from Madagascar vanilla pods',
        //         'category_id' => 3,
        //         'image_path' => 'uploads/products/iepeibpkalnftygaukkgafijihftogooyvsgszwc.jpg',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]
        // ];

        // $naturalIsolates = [
        //     [
        //         'name' => 'Citral',
        //         'description' => 'Pure natural isolate extracted from lemongrass oil',
        //         'category_id' => 4,
        //         'image_path' => 'uploads/products/iepeibpkalnftygaukkgafijihftogooyvsgszwc.jpg',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'name' => 'Geraniol',
        //         'description' => 'Premium natural isolate derived from rose oil',
        //         'category_id' => 4,
        //         'image_path' => 'uploads/products/iepeibpkalnftygaukkgafijihftogooyvsgszwc.jpg',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'name' => 'Menthol',
        //         'description' => 'Pure natural isolate crystallized from peppermint oil',
        //         'category_id' => 4,
        //         'image_path' => 'uploads/products/iepeibpkalnftygaukkgafijihftogooyvsgszwc.jpg',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]
        // ];

        // Batch insert products by category
        Product::insert($oils);
        Product::insert($concretes);
        // Product::insert($absolutes);
        // Product::insert($naturalIsolates);
    }
}
