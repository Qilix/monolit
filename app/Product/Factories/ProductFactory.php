<?php

namespace App\Product\Factories;

use App\Product\DTOs\ProductDTO;
use Illuminate\Http\Request;

class ProductFactory
{

    public static function fromRequest(Request $request): ProductDTO
    {
        $dto = new ProductDTO();

        $dto->name = $request->get('name');
        $dto->price = $request->get('price');

        return $dto;
    }
}
