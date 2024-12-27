<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id', 'vote'];

    /**
     * Define the relationship with the Post model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Define the relationship with the User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to filter votes by post.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByPost($query, Post $post) // Updated to use Post model
    {
        return $query->where('post_id', $post->id);
    }

    /**
     * Scope a query to filter votes by user.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Check if a vote is an upvote.
     *
     * @return bool
     */
    public function isUpvote()
    {
        return $this->vote === 1;
    }

    /**
     * Check if a vote is a downvote.
     *
     * @return bool
     */
    public function isDownvote()
    {
        return $this->vote === -1;
    }
}
