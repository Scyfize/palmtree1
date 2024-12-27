<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'body', 'image'];

    /**
     * The user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The comments associated with the post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Accessor to get the image URL.
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return Storage::url($this->image);
        }

        return asset('images/default.jpg');  // Optional: return a default image if none exists
    }

    /**
     * Mutator for the image field to store images in a public folder.
     */
    public function setImageAttribute($value)
    {
        if ($value && $value instanceof \Illuminate\Http\UploadedFile) {
            // If $value is an uploaded file, store it in the public/images folder
            $this->attributes['image'] = $value->store('public/images');
        } else {
            // Handle the case when $value is not a file (e.g., if it's a string or null)
            $this->attributes['image'] = $value;
        }
    }

    /**
     * Model event to delete image when the post is deleted.
     */
    protected static function booted()
    {
        static::deleting(function ($post) {
            if ($post->image) {
                Storage::delete($post->image);
            }
        });
    }
}
