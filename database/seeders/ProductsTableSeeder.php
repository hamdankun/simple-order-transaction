<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Product::whereIn('name', ['Product A', 'Product B', 'Product C'])->delete();

        Product::create([
        	'name' => 'Product A',
        	'description' => 'Product A Description',
        	'price' => 10000,
            'stock' => 100
        ]);

        Product::create([
        	'name' => 'Product B',
        	'description' => 'Product B Description',
        	'price' => 20000,
            'stock' => 100
        ]);

        Product::create([
        	'name' => 'Product C',
        	'description' => 'Product C Description',
        	'price' => 20000,
            'stock' => 100
        ]);
    }
}
