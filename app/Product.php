<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        "product_name", 
        "product_code",
        "quantity",
        "brand",
        "category_one",
        "category_two",
        "price",
        "images"
    ];
}
