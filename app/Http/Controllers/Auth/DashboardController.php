<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $postsCount = Post::count();
        $categoriesCount = Category::count();
        $tagsCount = Tag::count();
        $usersCount = User::count();
        $posts = Post::all();

        return view('layouts.dashboard', compact('postsCount', 'categoriesCount', 'tagsCount', 'usersCount', 'posts'));
    }
}
