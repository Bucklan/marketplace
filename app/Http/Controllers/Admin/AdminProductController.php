<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'comments')->get();
        $categories = Category::all();
        return view('admin.products.index', ['products' => $products, 'categories' => $categories]);
    }


    public function store(Request $request)
    {
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
        return redirect()->route('admin.products.index')->with('message', 'Product successfully created');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, Product $product)
    {
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
        $status = ['in_cart', 'ordered', 'confirmed'];
        for ($i = 0; $i < count($status); $i++) {
            if (!$product->productsWithStatus($status[$i])->first()) {

            $product->productsWithStatus($status[$i])->delete();
        }}
        $product->delete();
        return redirect()->route('admin.products.index')->with('message','Product successfully deleted');
    }
    public function destroyComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('message','Comment successfully deleted');
    }
}
