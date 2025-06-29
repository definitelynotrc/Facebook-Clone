<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = \App\Models\Post::with(['user', 'comments.user', 'likes'])->latest()->get();
        return view('feed', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'nullable|string|max:1000',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:20480', // 20MB max
        ]);

        $path = $request->hasFile('media')
            ? $request->file(key: 'media')->store('posts', 'public')
            : null;

        \App\Models\Post::create([
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
            'media_path' => $path,
        ]);

        return redirect()->back();
    }
    public function edit(\App\Models\Post $post)
    {
        // optional: authorize only the owner
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, \App\Models\Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'content' => 'required|string|max:1000',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi|max:20480',
        ]);

        // Handle media removal
        if ($request->filled('remove_media') && $post->media_path) {
            \Storage::disk('public')->delete($post->media_path);
            $post->media_path = null;
        }

        // Handle new media upload
        if ($request->hasFile('media')) {
            if ($post->media_path && !$request->filled('remove_media')) {
                \Storage::disk('public')->delete($post->media_path);
            }
            $post->media_path = $request->file('media')->store('posts', 'public');
        }

        $post->update([
            'content' => $request->input('content'),
            'media_path' => $post->media_path,
        ]);

        return redirect()->route('feed')->with('success', 'Post updated.');
    }


    public function destroy(\App\Models\Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully.');
    }


}
