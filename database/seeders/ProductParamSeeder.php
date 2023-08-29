<?php

namespace Database\Seeders;

use App\Models\ProductParam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row = [
            [
                'id' => 1,
                'product_id' => 1,
                'length' => 10,
                'width' => 5,
                'weight' => 1
            ],
            [
                'id' => 2,
                'product_id' => 2,
                'length' => 20,
                'width' => 10,
                'weight' => 1
            ],
            [
                'id' => 3,
                'product_id' => 3,
                'length' => 20,
                'width' => 10,
                'weight' => 1
            ],
            [
                'id' => 4,
                'product_id' => 4,
                'length' => 20,
                'width' => 10,
                'weight' => 1
            ],

            [
                'id' => 5,
                'product_id' => 5,
                'length' => 20,
                'width' => 10,
                'weight' => 1
            ],
            [
                'id' => 6,
                'product_id' => 6,
                'length' => 20,
                'width' => 10,
                'weight' => 1
            ],
            [
                'id' => 7,
                'product_id' => 7,
                'length' => 20,
                'width' => 10,
                'weight' => 1
            ],
        ];
        if(!ProductParam::where('id', 1)->exists()){
            ProductParam::insert($row);
        }
    }
}
