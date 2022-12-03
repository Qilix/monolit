<?php

use App\Category\Controllers\CategoryProductController;
use App\Product\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Category\Controllers\CategoryController;


Route::prefix('categories')->name('categories.')->group(function(){
    Route::get('', [CategoryController::class, 'CategoriesGet']);
    Route::post('/', [CategoryController::class, 'CategoryCreate']);
    Route::post('/{id}', [CategoryController::class, 'CategoryUpdate']);

    Route::get('/{id} ', [CategoryController::class, 'CategoryGet']);
    Route::get('/{id}/products ', [CategoryController::class, 'ProductsInCategoryGet']);


    //https://stackoverflow.com/questions/38737019/laravel-get-query-string

//    Route::get('/', [CategoryController::class, 'index'])->name('index');
//    Route::get('{includeProducts?}', [CategoryProductController::class, 'CategoriesListGet']);
//    Route::get('/{id}', [CategoryProductController::class, 'CategoryListGet']);
//    Route::get('/{id}/products ', [CategoryProductController::class, 'ProductsInCategoryGet']);
//    Route::get('/{id}/products ', [CategoryProductController::class, 'ProductsInCategoryListGet']);

});

Route::prefix('products')->name('products.')->group(function(){
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'create']);
    Route::post('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'delete']);
});
