<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        \App\Models\Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
            'comment' => $request->comment,
        ]);

        return redirect()->back();
    }

}
