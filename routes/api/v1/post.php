<?php

use \Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::name('posts.')->group(function () {
    Route::get('/posts', [postcontroller::class, 'index'])->name('index');
    Route::get('posts/{post}', [postcontroller::class, 'show'])->name('show');
    Route::post('/posts', [postcontroller::class, 'store'])->name('store');
    Route::patch('posts/{post}', [postcontroller::class, 'update'])->name('update');
    Route::delete('posts/{post}', [postcontroller::class, 'destroy'])->name('delete');

});
