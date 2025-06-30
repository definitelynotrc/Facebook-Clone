<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/run-migrations', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return '✅ Migrations complete!';
    } catch (\Throwable $e) {
        return response('<pre>' . $e->getMessage() . "\n\n" . $e->getTraceAsString() . '</pre>', 500);
    }
});
Route::get('/show-log', function () {
    $logFile = storage_path('logs/laravel.log');
    if (!file_exists($logFile)) {
        return 'No log file found.';
    }

    return response('<pre>' . e(file_get_contents($logFile)) . '</pre>');
});

Route::get('/ping', function () {
    return 'pong';
});
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('feed')
        : redirect()->route('login');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/feed', [PostController::class, 'index'])->name('feed');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/likes', [LikeController::class, 'store'])->name('likes.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');


});


require __DIR__ . '/auth.php';
