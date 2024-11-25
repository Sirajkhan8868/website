<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Comment;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Post::all();
        return view('site.index',compact('blogs'));
    }
    public function openSingleBlog($id)
{
    $blog = Post::find($id);

    if (! $blog) {
        abort(404);
    }

    $comments = Comment::where('post_id', $blog->id)->get();

    return view('site.single', compact('blog','comments'));
}

}
