<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Comments\CreateRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComment(CreateRequest $request, $postId)
    {

        if (auth()->check()) {

            $post = Post::find($postId);

            if (! $post) {
                return back()->withErrors('Unable to find the post. Please refresh the page and try again');
            }

            Comment::create([
                'post_id' => $postId,
                'user_id' => auth()->id(),
                'comment' => $request->comment
            ]);

            $request->session()->flash('alert-success',' Comment  added successfully, it will be visible le after admin approval');
        }
        return back();
    }
}
