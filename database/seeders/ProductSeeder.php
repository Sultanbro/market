<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row = [
            ['id' => 1,'name' => 'Cortigiani',  'description' => null,  'slug' => 'cortigiani',   'category_id' => 5,'price' => 100,'created_by' => 1,'updated_by' => 1],
            ['id' => 2,'name' => 'Versace',     'description' => null,  'slug' => 'versace',      'category_id' => 5,'price' => 200,'created_by' => 1,'updated_by' => 1],
            ['id' => 3,'name' => 'Zilli',       'description' => null,  'slug' => 'zilli',        'category_id' => 5,'price' => 300,'created_by' => 1,'updated_by' => 1],
            ['id' => 4,'name' => 'Saint Laurent','description' => null, 'slug' => 'saint-laurent','category_id' => 5,'price' => 400,'created_by' => 1,'updated_by' => 1],
            ['id' => 5,'name' => 'Armani',      'description' => null,  'slug' => 'armani',       'category_id' => 5,'price' => 500,'created_by' => 1,'updated_by' => 1],
            ['id' => 6,'name' => 'Diesel',      'description' => null,  'slug' => 'diesel',       'category_id' => 5,'price' => 600,'created_by' => 1,'updated_by' => 1],
            ['id' => 7,'name' => 'Stefano Ricci','description' => null, 'slug' => 'ricci',        'category_id' => 5,'price' => 700,'created_by' => 1,'updated_by' => 1],
            ['id' => 8,'name' => 'Palm Angels', 'description' => null,  'slug' => 'palm-angels',  'category_id' => 5,'price' => 100,'created_by' => 1,'updated_by' => 1],
            ['id' => 9,'name' => 'Brioni',      'description' => null,  'slug' => 'brioni',       'category_id' => 5,'price' => 800,'created_by' => 1,'updated_by' => 1],
            ['id' => 10,'name' => 'Isaia',      'description' => null,  'slug' => 'isaia',        'category_id' => 5,'price' => 900,'created_by' => 1,'updated_by' => 1],
            ['id' => 11,'name' => 'Eleventy',   'description' => null,  'slug' => 'eleventy',     'category_id' => 5,'price' => 200,'created_by' => 1,'updated_by' => 1],
            ['id' => 12,'name' => 'Strellson',  'description' => null,  'slug' => 'strellson',    'category_id' => 5,'price' => 300,'created_by' => 1,'updated_by' => 1],
            ['id' => 13,'name' => 'Corneliani', 'description' => null,  'slug' => 'corneliani',   'category_id' => 5,'price' => 500,'created_by' => 1,'updated_by' => 1],
            ['id' => 14,'name' => 'Castello',   'description' => null,  'slug' => 'castello',     'category_id' => 5,'price' => 600,'created_by' => 1,'updated_by' => 1],
            ['id' => 15,'name' => 'Replay',     'description' => null,  'slug' => 'replay',       'category_id' => 5,'price' => 100,'created_by' => 1,'updated_by' => 1],

            ['id' => 16,'name' => 'Свитер',     'description' => null,  'slug' => 'replay',       'category_id' => 2,'price' => 100,'created_by' => 1,'updated_by' => 1],
            ['id' => 17,'name' => 'Свитер',     'description' => null,  'slug' => 'replay',       'category_id' => 2,'price' => 200,'created_by' => 1,'updated_by' => 1],
            ['id' => 18,'name' => 'Свитер',     'description' => null,  'slug' => 'replay',       'category_id' => 2,'price' => 300,'created_by' => 1,'updated_by' => 1],
        ];
        if(!Product::where('id', 1)->exists()){
            Product::insert($row);
        }

    }
}
