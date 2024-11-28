<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Post::SimplePaginate(4);
        return view('site.index',compact('blogs'));
    }
    public function openSingleBlog($id)
{
    $blog = Post::find($id);

    if (! $blog) {
    }

    $comments = Comment::where('post_id', $blog->id)->SimplePaginate(2);
    // $comments = Comment::where('post_id', $blog->id)->get();
    $latestPosts = Post::latest()->take(1)->get();
    $tags = $blog->tags;
    return view('site.single', compact('blog','comments','latestPosts','tags'));
}
}
