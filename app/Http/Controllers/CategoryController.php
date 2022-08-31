<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            'title' => 'Post Categories',
            'active' => 'categories',
            'categories' => Category::all(),
        ]);
    }

    public function postInCategory(Category $category)
    {
        return view('posts', [
            'title' => "Post by Category : $category->name",
            'active' => 'categories',
            'posts' => $category->posts->load(['category', 'author']),
            'category' => $category->name,
        ]);
    }
}
