<?php

namespace App\Product\Controllers;

use App\Common\Controllers\Controller;
use App\Product\Factories\ProductFactory;
use App\Product\Presenters\ProductPresenter;
use App\Product\Queries\ProductQueries;
use App\Product\Requests\ProductCreateRequest;
use App\Product\Requests\ProductUpdateRequest;
use App\Product\Services\ProductServices;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function index(ProductQueries $queries, ProductPresenter $presenter)
    {
        $products = $queries->getAll();
        return Response::json(['data' => $presenter->collect($products)]);
    }

    public function create(ProductCreateRequest $request, ProductPresenter $presenter, ProductServices $service)
    {
        $dto = ProductFactory::fromRequest($request);
        $model = $service->createProduct($dto);
        return Response::json($presenter->present($model));
    }

    public function update($id, ProductUpdateRequest $request, ProductPresenter $presenter, ProductServices $service, ProductQueries $queries)
    {
        $dto = ProductFactory::fromRequest($request);
        $model = $service->updateProduct($id, $queries, $dto);
        return Response::json($presenter->present($model));
    }

    public function delete($id, ProductServices $service, ProductQueries $queries)
    {
        $service->deleteProduct($id, $queries);
        return Response::json(['message' => 'Successfully deleted']);
    }
}
