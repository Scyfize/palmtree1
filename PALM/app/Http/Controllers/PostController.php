<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Show the form to create a new post
    public function create()
    {
        return view('posts.create');
    }

    // Store a new post in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Image handling
        $imagePath = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Store the image in the public storage under 'posts' directory
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        // Create the post with the associated data
        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
            'image' => $imagePath, // Store image path in the database
        ]);

        return redirect()->route('forum')->with('success', 'Post created successfully.');
    }

    // Show a single post with its details
    public function show($id)
    {
        // Retrieve the post and its associated comments
        $post = Post::with(['comments'])->findOrFail($id);

        // Return the view for displaying the post
        return view('posts.show', compact('post'));
    }

    // Store a comment for a post
    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $post = Post::findOrFail($postId);

        // Create and store the comment for the post
        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.show', $postId)->with('success', 'Comment added successfully.');
    }

    // Delete a post
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Check if the logged-in user is the one who created the post
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('forum')->with('error', 'You are not authorized to delete this post.');
        }

        // If the post has an image, delete it from the storage
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        // Delete the post
        $post->delete();

        return redirect()->route('forum')->with('success', 'Post deleted successfully.');
    }
}
