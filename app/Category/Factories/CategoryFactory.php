<?php

namespace App\Category\Factories;

use App\Category\DTOs\CategoryDTO;
use Illuminate\Http\Request;

class CategoryFactory
{

    public static function fromRequest(Request $request): CategoryDTO
    {
        $dto = new CategoryDTO();

        $dto->name = $request->get('name');
        $dto->parent_id = $request->get('parent_id');

        return $dto;
    }
}
