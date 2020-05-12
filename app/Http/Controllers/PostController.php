<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Comments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(string $slug)
    {
        $post = Posts::where('slug', $slug)->first();

        return view(
            'post',
            array(
                'page_title' => 'The Mount Everest Blog | ' . $post->title,
                'header_title' => 'The Mount Everest Blog',
                'page_description' => 'Blog about mountaineering',
                'post' => $post,
                'comments' => Comments::where('post_id', $post->id)->get()
            )
        );
    }

    public function add(Request $request)
    {
        $image = $request->file('image');
        $image->move('assets/img/posts', $image->getClientOriginalName());

        $post = new Posts;
        $post->title = $request->input('title');
        $post->slug = Str::slug($request->input('title'), '-');
        $post->content = $request->input('content');
        $post->image = $image->getClientOriginalName();
        $post->save();

        return back();
    }

    public function edit(Request $request, int $id)
    {
        $post = Posts::find($id);
        $post->title = $request->input('title');
        $post->slug = Str::slug($request->input('title'), '-');
        $post->content = $request->input('content');
        $post->save();
    }

    public function replaceImage(Request $request, int $id)
    {
        $post = Posts::find($id);
        unlink(public_path('assets/img/posts/' . $post->image));
    
        $image = $request->file('image');
        $image->move('assets/img/posts', $image->getClientOriginalName());
        
        $post->image = $image->getClientOriginalName();
        $post->save();
    }

    public function delete(int $id)
    {
        $post = Posts::find($id);
        unlink(public_path('assets/img/posts/' . $post->image));
        $post->delete();

        return back();
    }
}
