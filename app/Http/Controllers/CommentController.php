<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
//        dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'product_id' => 'required|numeric|exists:products,id',
        ]);
        Auth::user()->comments()->create($validated);
        return redirect()->back()->with('message', 'comment successfully created');
    }

    public function edit(Comment $comment)
    {
        $categories = Category::all();
        return view('comments.edit', ['comment' => $comment, 'categories' => $categories]);
    }

    public function update(Request $request, Comment $comment)
    {
//    { dd($request);
        $request->validate([
            'name' => 'required|max:255',
//            'product_id'=>'required|numeric|exists:products,id'
        ]);

        $comment->update([
            'name' => $request->name,
            'product_id' => $comment->product->id
        ]);
        return redirect()->route('products.show', $comment->product->id)->with('message', 'your comment successfully edited');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('message','Your comment successfully deleted');
    }
}
