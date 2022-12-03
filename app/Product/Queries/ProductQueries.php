<?php

namespace App\Product\Queries;

use App\Models\Product;

class ProductQueries{

    public function getAll(){
        return Product::get();
    }

    public function getProductById($id){
        return Product::findOrFail($id);
    }
}
