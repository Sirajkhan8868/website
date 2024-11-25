<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // $blogs = Post::all();
        return view('site.index',compact('blogs'));
    }
    public function openSingleBlog($id)
    {
        $blog = Post::find($id);

        if (! $blog) {
            abort(404);
        }

        return view('site.single', compact('blog', 'comments'));
    }

}

