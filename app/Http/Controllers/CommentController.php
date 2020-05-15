<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Comments;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function add(CommentRequest $commentRequest, int $postId)
    {
        $commentRequest->validated();

        $comment = new Comments;
        $comment->post_id = $postId;
        $comment->author = $commentRequest->input('author');
        $comment->content = $commentRequest->input('content');
        $comment->save();

        return redirect()->route('post', [
            'slug' => Posts::where('id', $postId)->first()->slug
        ]);
    }

    public function delete(int $id)
    {
        Comments::where('id', $id)->delete();
        return back();
    }
}
