<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Add the user_id to the fillable property to allow mass assignment
    protected $fillable = [
        'user_id', // Add user_id to the fillable array
        'post_id',
        'body',
    ];

    // Define relationships if necessary
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
