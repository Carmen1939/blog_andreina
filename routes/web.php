<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('posts',PostController::class)->except(['show']);

Route::controller(PageController::class)->group(function() {
    Route::get('/', [PageController::class, 'home'])->name('home'); // Asegúrate de que 'home' exista en PageController
    Route::get('blog', [PageController::class, 'blog'])->name('blog'); // Asegúrate de que 'blog' exista en PageController
    Route::get('/{post:slug}', [PageController::class, 'post'])->name('post'); // Asegúrate de que 'post' exista en PageController
});
