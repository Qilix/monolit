<?php

namespace App\Product\Services;

use App\Models\Product;
use App\Product\DTOs\ProductDTO;
use App\Product\Queries\ProductQueries;

class ProductServices
{

    public function createProduct(ProductDTO $dto): Product
    {
        $product = new Product();

        $product->name = $dto->name;
        $product->price = $dto->price;

        $product->save();

        return $product;
    }

    public function updateProduct($id, ProductQueries $quaries, ProductDTO $dto): Product
    {
        $product = $quaries->getProductById($id);

        $product->name = isset($dto->name) ? $dto->name : $product->name;
        $product->price = isset($dto->price) ? $dto->price : $product->price;

        $product->save();

        return $product;
    }

    public function deleteProduct($id, ProductQueries $queries)
    {
        $product = $queries->getProductById($id);

        $product->delete();
    }
}
