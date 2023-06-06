<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminProductController;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        return view('admin.categories.index', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
//        dd($request);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('categories', $fileName, 'public');
        $validated['image'] = 'storage/' . $image_path;
        Category::create($validated);
        return redirect()->route('admin.categories.index')->with('message', 'Category successfully saved');
    }


    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('categories', $fileName, 'public');
        $validated['image'] = 'storage/' . $image_path;
        $category->update($validated);
        return redirect()->route('admin.categories.index')->with('message', 'Category successfully edited');
    }

    public function destroy(Category $category)
    {
        $products = Product::where('category_id', $category->id)->with('comments')->get();
            $status = ['in_cart', 'ordered', 'confirmed'];
        if ($products != null) {
            foreach ($products as $product) {
                $product->comments()->delete();
                for ($i = 0; $i < count($status); $i++) {
                        $product->productsWithStatus($status[$i])->delete();
                }
            }

        }
        $category->products()->delete();
        $category->delete();
        return redirect()->route('admin.categories.index')->with('message', 'Category successfully deleted');
    }
}
