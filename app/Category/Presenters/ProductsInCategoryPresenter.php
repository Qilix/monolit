<?php


namespace App\Category\Presenters;

use App\Category\Resources\ProductsInCategoryResource;
use App\Models\Category;
use App\Product\Presenters\ProductPresenter;

class ProductsInCategoryPresenter
{
    public function __construct(protected CategoryPresenter $categoryPresenter, protected productPresenter $productPresenter)
    {
    }

    public function present(Category $category): ProductsInCategoryResource
    {

        $resource = new ProductsInCategoryResource();
        $resource->products = $this->productPresenter->collect($category->products);

        if(in_array('childrenCategories', $category->getQueueableRelations())) {
            $resource->childrenCategories = $this->categoryPresenter->collect($category->childrenCategories);
        }

        return $resource;
    }
}
