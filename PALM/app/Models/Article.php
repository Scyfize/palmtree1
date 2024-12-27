<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Define the table name if it's different from the default plural form
    protected $table = 'articles'; 

    // Define the fillable fields to protect against mass-assignment vulnerabilities
    protected $fillable = ['title', 'author', 'body'];
}
