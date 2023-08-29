<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row = [
            [
                'id' => 1,
                'parent_id' => 0,
                'name' => 'Одежда',
            ],
            [
                'id' => 2,
                'parent_id' => 1,
                'name' => 'Мужская',
            ],
            [
                'id' => 3,
                'parent_id' => 1,
                'name' => 'Женская'
            ],
            [
                'id' => 4,
                'parent_id' => 1,
                'name' => 'Детская'
            ],

            [
                'id' => 5,
                'parent_id' => 2,
                'name' => 'Джинсы',
            ],
            [
                'id' => 6,
                'parent_id' => 3,
                'name' => 'Джинсы(женские)'
            ],
            [
                'id' => 7,
                'parent_id' => 4,
                'name' => 'Джинсы(детские)'
            ],
        ];
        if(!Category::where('id', 1)->exists()){
            Category::insert($row);
        }

    }
}
