<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Client\Contracts\GetAllCategories;
use App\Services\Client\Contracts\GetProductsByCategory;
use App\Services\Client\Resources as Resources;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $response = app(GetAllCategories::class)->execute();

        return Resources\Category\GetListResource::collection($response);
    }

    public function getProductsByCategory(Category $category)
    {
        $response = app(GetProductsByCategory::class)->execute(
            $category
        );

        return Resources\Product\AllByCategoryResource::collection($response);
    }
}
