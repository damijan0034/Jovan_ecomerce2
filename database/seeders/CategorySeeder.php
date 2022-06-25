<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            [
                'category_name' => 'kompjuteri',
                'children' => [
                    [
                        'category_name' => 'laptopovi',
                        'children' => [
                            ['category_name' => 'asus'],
                            ['category_name' => 'toshiba'],
                            ['category_name' => 'lenovo'],
                        ],
                    ],
                    [
                        'category_name' => 'desktop',
                        'children' => [
                            ['category_name' => 'atlon'],
                            ['category_name' => 'sempron'],
                            ['category_name' => 'barton'],
                        ],

                    ],
                ],
            ],

            [
                'category_name' => 'delovi-za-kompjuter',
                'children' => [
                    [
                        'category_name' => 'procesori',
                        'children' => [
                            ['category_name' => 'AMD socket'],
                            ['category_name' => 'Intel socket'],
                        ],
                    ],
                    [
                        'category_name' => 'maticne-ploce',
                        'children' => [
                            ['category_name' => 'amd'],
                            ['category_name' => 'intel'],
                            ['category_name' => 'celeron'],
                        ],
                    ],
                ],
            ],
        ];


        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
