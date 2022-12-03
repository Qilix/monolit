<?php


namespace App\Product\Presenters;

use App\Product\Resources\ProductResource;
use App\Models\Product;

class ProductPresenter
{

    public function present(Product $product): ProductResource
    {
        $resource = new ProductResource();

        $resource->id = $product->id;
        $resource->name = $product->name;
        $resource->price = $product->price;

        return $resource;
    }

    public function collect($products): array
    {
        return $products->map(function (Product $product) {
            return $this->present($product);
        })->toArray();
    }
}
