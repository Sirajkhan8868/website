<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Tag;
use App\Models\PostTag;
use Illuminate\Http\Request;
use Auth;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Facades\Storage;
use str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {

        // if ($file = $request->file('file')) {

        //     $fileName = rand(100, 10000) . time() . $file->getClientOriginalName();

        //     $filePath = public_path('/storage/auth/posts/');

        //     // $fileWithPath = $filePath. $fileName;

        //     $file->move($filePath, $fileName);

        //     $gallery = Gallery::create([
        //         'image' => $fileName,
        //         'type' => Gallery::POST_IMAGE
        //     ]);

        // }

        if ($file = $request->file('file')) {
            $gallery = $this->uploadFile($file);
        }

        $post = Post::create([
            'gallery_id' => $gallery->id,
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category,
        ]);

        $validated = $request->validate([
            'file' => 'required|mimes:jpg,png',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'category' => 'required',
        ]);


        if ($request->has('tags')) {
            foreach ($request->tags as $tag) {
                PostTag::create([
                    'tag_id' => $tag,
                    'post_id' => $post->id,
                ]);
            }
        }

        return redirect()->route('dashboard')->with('success', 'Blog created successfully!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {

        // dd($post);
        if ($file = $request->file('file')) {

            //get the database
            $imageName = $post->gallery->image;

            $imagePath = public_path('/storage/auth/posts/');

            if (file_exists($imageName . $imageName)) {
                unlink($imageName . $imageName); //delete the image database
            }

           $this->uploadFile($file);
            //update the images

            $post->gallery->update([

                'image' => ddd

            ]);

            $post->update([

                'user_id' => auth()->id(),
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category,
            ]);
        } else {
            dd('no');
        }



        $validated = $request->validate([
            'file' => 'required|mimes:jpg,png',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'category' => 'required',
        ]);

        PostTag::where('post_id', $post->id)->delete();

        foreach ($request->tags as $tag) {
            PostTag::create([
                'tag_id' => $tag,
                'post_id' => $post->id,
            ]);
        }

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    private function uploadFile($file)
    {

        $fileName = rand(100, 10000) . time() . $file->getClientOriginalName();

        $filePath = public_path('/storage/auth/posts/');

        // $fileWithPath = $filePath. $fileName;

        $gallery = $file->move($filePath, $fileName);

    }

    private function storeImage($fileName)
    {
        $gallery = Gallery::create([
            'image' => $fileName,
            'type' => Gallery::POST_IMAGE
        ]);

        return $gallery;
    }
}
