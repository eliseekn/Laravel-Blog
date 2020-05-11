<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Http\Controllers\Controller;
use App\Posts;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add(Request $request, $postId)
    {
        $comment = new Comments;
        $comment->post_id = $postId;
        $comment->author = $request->input('author');
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->route('post', array('slug' => Posts::where('id', $postId)->first()->slug));
    }

    public function delete($id)
    {
        Comments::where('id', $id)->delete();
        return redirect()->route('dashboard.comments');
    }
}
