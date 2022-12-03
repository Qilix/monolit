<?php


namespace App\Category\Presenters;

use App\Category\Resources\CategoryResource;
use App\Models\Category;
use App\Product\Presenters\ProductPresenter;

class CategoryPresenter
{
    public function __construct(protected ProductPresenter $productPresenter)
    {
    }

    public function present(Category $category): CategoryResource
    {

        $resource = new CategoryResource();

        $resource->id = $category->id;
        $resource->name = $category->name;
        $resource->parent_id = $category->parent_id;
        if(in_array('products', $category->getQueueableRelations())) {
            $resource->products = $this->productPresenter->collect($category->products);
        }

        return $resource;
    }

    public function collect($categories): array
    {
        return $categories->map(function (Category $category) {
            return $this->present($category);
        })->toArray();
    }
}
