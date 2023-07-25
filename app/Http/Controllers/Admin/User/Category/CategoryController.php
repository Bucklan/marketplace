<?php

namespace App\Http\Controllers\Admin\User\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Admin\Dto\Category\CreateDtoFactory;
use App\Services\Admin\Dto\Category\UpdateDtoFactory;
use App\Services\Admin\Requests\Category\StoreRequest;
use App\Services\Admin\Requests\Category\UpdateRequest;
use App\Services\Admin\Contracts as Contracts;
use Auth;

class CategoryController extends Controller
{

    private string $url = 'admin.categories.';
    private string $route = 'admin.categories.';
    private string $message = 'Your category successfully ';

    public function index()
    {
        $this->authorize('viewAny', Auth::user());
        $categories = app(Contracts\GetAllCategories::class)->execute();
        return view($this->url . 'index', ['categories' => $categories]);
    }

    public function edit(Category $category)
    {

        return view($this->url . 'edit', ['category' => $category]);
}

    public function store(StoreRequest $request)
    {
        $this->authorize('viewAny', Auth::user());
        app(Contracts\CreateCategory::class)->execute(
            CreateDtoFactory::fromRequest($request));

        return redirect()->route($this->route . 'index')->with('message', $this->message . 'created!');

    }


    public function update(UpdateRequest $request, Category $category)
    {
        $this->authorize('viewAny', Auth::user());

        app(Contracts\UpdateCategory::class)->execute(
            $category, UpdateDtoFactory::fromRequest($request));

        return redirect()->route($this->route . 'index')->with('message', $this->message . 'updated!');
    }

    public function destroy(Category $category)
    {
        $this->authorize('viewAny', Auth::user());

        app(Contracts\DeleteCategory::class)->execute($category);

        return redirect()->route($this->route . 'index')->with('message', $this->message . 'deleted!');
    }
}
