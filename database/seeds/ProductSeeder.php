<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
        [
            'product_name' => 'adidas outdoor running ', 
            'product_code' => 'outrun1122',
            'quantity' => '100',
            'brand' => 'Adidas',
            'category_one' => 'Women',
            'category_two' => 'Shoes',
            'price' => '100',
            'images' => 'https://i.pinimg.com/originals/b1/ec/7f/b1ec7f899fa40b04fd7b73f7c89f73cd.jpg'
        ],
        [
            'product_name' => 'outdoor adidas speed runner', 
            'product_code' => 'speedrun200',
            'quantity' => '140',
            'brand' => 'Adidas',
            'category_one' => 'Men',
            'category_two' => 'Shoes',
            'price' => '100',
            'images' => 'https://5.imimg.com/data5/AA/VK/MY-17913176/adidas-men-tubular-shadow-knit-shoes-500x500.jpg'
        ],
        ]);
    }
}
