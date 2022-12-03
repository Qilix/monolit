<?php

namespace App\Category\Queries;

use App\Models\Category;

class CategoryQueries{

    public function getAll($include){
        return Category::when($include, function ($query) {
            $query->with('products');
        })->get();
    }

    public function getCategoryById($include,$id){
        return Category::when($include, function ($query) {
            $query->with('products');
        })->findOrFail($id);
    }

    public function getChildrenCategoryById($children,$id){
        return Category::when($children, function ($query) {
            $query->with('childrenCategories');
        })->with('products')->findOrFail($id);
    }
}
