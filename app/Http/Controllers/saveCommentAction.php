<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class saveCommentAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'body' => 'required | max: 1000 | string ',
                'name' => 'required | max: 100 | string ',
                'company_id'=>'integer',
            ]);
            $comment = new Comment;
            $comment->body = $request->input('body');
            $comment->name = $request->input('name');
            $comment->company_id = $request->input('company_id');

            $comment->save();

        } else {
            return back();
        }
        return back();
    }
}
