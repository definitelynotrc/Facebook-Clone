<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $like = \App\Models\Like::where('user_id', auth()->id())
            ->where('post_id', $request->post_id)
            ->first();

        if ($like) {
            $like->delete(); // toggle unlike
        } else {
            \App\Models\Like::create([
                'user_id' => auth()->id(),
                'post_id' => $request->post_id,
            ]);
        }

        return redirect()->back();
    }

}
