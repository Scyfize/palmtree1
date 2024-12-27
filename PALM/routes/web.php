<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;


// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Forum Routes
Route::get('/forum', [ForumController::class, 'index']);

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/posts/create', [ForumController::class, 'insert'])->name('insertforum');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    Route::post('/forum/{forum}/comment', [ForumController::class, 'addComment'])->name('addcomment');
    Route::delete('/comment/{comment}', [ForumController::class, 'deleteComment'])->name('deletecomment');

    // Profile
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/forum/{forum}', [ForumController::class, 'delete'])->name('deleteforum');
});


// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Article Routes
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/test-image', function () {
    $path = storage_path('app/public/posts/yYTWOUupGWyvOO0JGzxmJPesbGwRWchG0FOrjDl0.png'); // Adjust the path accordingly
    if (file_exists($path)) {
        return response()->file($path);
    } else {
        return 'File does not exist.';
    }
});



