<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function productByCategory(Category $category)
    {

        $categories = Category::all();

        return view('products.index', [
            'products' => $category->products,
            'categories' => $categories,
        ]);
    }

    public function index()
    {
//        dd(Auth::user()->id);
        $products = Product::with('category')->get();
        return view('products.index', ['products' => $products,'categories'=> Category::all()]);

    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
//        dd($request);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image',
            'category_id' => 'required|numeric|exists:categories,id'
        ]);
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('products', $fileName, 'public');
        $validated['image'] = 'storage/' . $image_path;
        Auth::user()->product()->create($validated);
        return redirect()->route('products.index')->with('message', 'Product successfully created');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, Product $product)
    {
//        dd($request);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image',
            'category_id' => 'required|numeric|exists:categories,id'
        ]);
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('products', $fileName, 'public');
        $validated['image'] = 'storage/' . $image_path;
        $product->update($validated);
        return redirect()->route('admin.products.index')->with('message', 'Product successfully deleted');

    }

    public function destroy(Product $product)
    {
        $product->comments()->delete();
        $status = ['in_cart','ordered','confirmed'];
        for($i = 0;$i<count($status);$i++){
            $product->shopsWithStatus($status[$i])->delete();
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('message', 'Product successfully deleted');
    }
}
