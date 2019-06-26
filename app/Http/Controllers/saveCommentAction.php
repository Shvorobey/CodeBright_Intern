<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class saveCommentAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CommentRequest $request)
    {
        $comment = new Comment;
        $comment->body = $request->input('body');
        $comment->company_id = $request->input('company_id');

        $comment->save();

        return back();
    }
}
