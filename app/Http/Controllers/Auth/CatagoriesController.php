<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function OpenCategoriesPage()
    {
        $categories = Category::all();
        $posts = Post::all();
      return view('categories.index', compact('categories','posts'));
    }
}
