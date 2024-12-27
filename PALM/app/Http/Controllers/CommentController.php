<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a new comment for a specific post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $postId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $post = Post::findOrFail($postId);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.show', $postId)
            ->with('success', 'Comment added successfully.');
    }

    /**
     * Delete a specific comment.
     *
     * @param  int  $commentId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        // Ensure the authenticated user owns the comment
        if ($comment->user_id !== Auth::id()) {
            return redirect()->back()
                ->with('error', 'You are not authorized to delete this comment.');
        }

        $comment->delete();

        return redirect()->back()
            ->with('success', 'Comment deleted successfully.');
    }
}
