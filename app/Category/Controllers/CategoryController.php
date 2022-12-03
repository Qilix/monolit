<?php

namespace App\Category\Controllers;


use App\Category\Factories\CategoryFactory;
use App\Category\Presenters\CategoriesListPresenter;
use App\Category\Presenters\CategoryPresenter;
use App\Category\Presenters\ProductsInCategoryPresenter;
use App\Category\Queries\CategoryProductQueries;
use App\Category\Queries\CategoryQueries;
use App\Category\Requests\CategoryCreateRequest;
use App\Category\Requests\CategoryUpdateRequest;
use App\Category\Services\CategoryServices;
use App\Common\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller{

    protected $include;
    protected $children;

    public function __construct(Request $request){
        $this->include = $request->query('includeProducts');
        $this->children = $request->query('includeChildren');
    }

    public function CategoriesGet(CategoryQueries $queries, CategoryPresenter $presenter)
    {
        $categories = $queries->getAll($this->include);
        return Response::json(['data' => $presenter->collect($categories)]);
    }

    public function CategoryCreate(CategoryCreateRequest $request, CategoryPresenter $presenter, CategoryServices $service)
    {
        $dto = CategoryFactory::fromRequest($request);
        $model = $service->createCategory($dto);
        return Response::json($presenter->present($model));
    }

    public function CategoryUpdate($id, CategoryUpdateRequest $request, CategoryPresenter $presenter, CategoryServices $service, CategoryQueries $queries)
    {
        $dto = CategoryFactory::fromRequest($request);
        $model = $service->updateCategory($id, $queries, $dto);
        return Response::json($presenter->present($model));
    }

    public function CategoryGet($id, CategoryQueries $queries, CategoryPresenter $presenter)
    {
        $category = $queries->getCategoryById($this->include, $id);
        return Response::json(['data' => $presenter->present($category)]);
    }

    public function ProductsInCategoryGet($id, CategoryQueries $queries, ProductsInCategoryPresenter $presenter)
    {
        $category = $queries->getChildrenCategoryById($this->children, $id);
        return Response::json(['data' => $presenter->present($category)]);
    }

}
