<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        // Fetch posts from the database, including related users and order by latest
        $forums = Post::all();

        // Pass the posts to the forum view
        return view('forum.showforum', compact('forums'));
    }

    public function insert(Request $request)
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
        ]);

        return redirect('/forum')->with('success', 'Forum created successfully.');
    }

    public function delete($id)
    {
        $forum = Post::findOrFail($id);

        // Check if the logged-in user is the owner of the forum
        if (Auth::id() == $forum->user_id || Auth::user()->username === 'admin') {
            $forum->delete();
            return redirect('/forum')->with('success', 'Forum deleted successfully!');
        } else {
            return redirect('/forum')->with('error', 'You are not authorized to delete this forum.');
        }
    }

    public function addComment(Request $request, $forumId)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $forum = Post::findOrFail($forumId);

        // Create a new comment
        $comment = new Comment([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'post_id' => $forum->id,
        ]);
        $comment->save();

        return redirect('/forum')->with('success', 'Comment added successfully!');
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);

        // Check if the logged-in user is the owner or an admin
        if (Auth::id() == $comment->user_id || Auth::user()->username === 'admin') {
            $comment->delete();
            return redirect('/forum')->with('success', 'Comment deleted successfully!');
        } else {
            return redirect('/forum')->with('error', 'You are not authorized to delete this comment.');
        }
    }
}
