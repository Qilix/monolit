<?php

namespace App\Category\Services;

use App\Category\Exceptions\ParentIdException;
use App\Models\Category;
use App\Category\DTOs\CategoryDTO;
use App\Category\Queries\CategoryQueries;

class CategoryServices
{

    public function createCategory(CategoryDTO $dto): Category
    {
        $category = new Category();

        $category->name = $dto->name;
        $category->parent_id = isset($dto->parent_id) ? $dto->parent_id : Null;

        $category->save();

        return $category;
    }

    public function updateCategory($id, CategoryQueries $quaries, CategoryDTO $dto): Category
    {
        $category = $quaries->getCategoryById($id);

        if($category->parent_id === $dto->parent_id and $category->parent_id !== Null){
            throw new ParentIdException();
        }

        $category->name = isset($dto->name) ? $dto->name : $category->name;
        $category->parent_id = isset($dto->parent_id) ? $dto->parent_id : $category->parent_id;

        $category->save();

        return $category;
    }

}
