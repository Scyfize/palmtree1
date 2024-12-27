<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VoteController extends Controller
{
    public function store(Request $request, Post $post) // Use 'Post $post' instead of postId
    {
        // Validate that the vote is either 1 (upvote) or -1 (downvote)
        $request->validate([
            'vote' => 'required|in:1,-1',
        ]);

        try {
            $user = Auth::user();

            // Use DB transaction for atomic operations
            DB::beginTransaction();

            // Check if the user has already voted on this post
            $existingVote = $post->votes()->where('user_id', $user->id)->first();

            if ($existingVote) {
                // If the user has voted, update the existing vote
                $existingVote->update([
                    'vote' => $request->vote,
                ]);
            } else {
                // If the user hasn't voted yet, create a new vote record
                $post->votes()->create([
                    'user_id' => $user->id,
                    'vote' => $request->vote,
                ]);
            }

            // Update the upvote and downvote counts in the database
            $post->update([
                'upvotes' => DB::table('votes')->where('post_id', $post->id)->where('vote', 1)->count(),
                'downvotes' => DB::table('votes')->where('post_id', $post->id)->where('vote', -1)->count(),
            ]);

            // Commit the transaction if everything is successful
            DB::commit();

        } catch (\Exception $e) {
            // Rollback transaction in case of an error
            DB::rollback();
            // Log the error with additional details
            Log::error('Error while voting on post: ' . $e->getMessage(), ['postId' => $post->id, 'userId' => Auth::id()]);
            // Return a generic error response
            return response()->json(['error' => 'An error occurred while voting.'], 500);
        }

        // If the request expects JSON, return the updated vote counts
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Vote recorded.',
                'upvotes' => $post->upvotes,
                'downvotes' => $post->downvotes,
            ], 200);
        }

        // If the request expects a redirect (web), redirect with a success message
        return redirect()->route('posts.show', $post->id)->with('success', 'Vote recorded.');
    }
}
