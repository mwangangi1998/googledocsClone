<?php

use \Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

Route::name('comments')->group(function () {
    Route::get('/comments', [commentcontroller::class, 'index'])->name('index');
    Route::get('comments/{comment}', [commentcontroller::class, 'show'])->name('show');
    Route::post('/comments', [commentcontroller::class, 'store'])->name('store');
    Route::patch('comments/{comment}', [commentcontroller::class, 'update'])->name('update');
    Route::delete('comments/{comment}', [commentcontroller::class, 'destroy'])->name('delete');

});
