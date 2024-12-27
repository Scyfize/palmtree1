<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::all(); // Fetch all articles or use pagination for scalability
        return view('auth.home', ['articles' => $articles, 'forums' => Post::all()]); // Pass articles to the view
    }
}
