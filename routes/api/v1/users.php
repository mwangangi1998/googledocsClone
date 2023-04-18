<?php
use \Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::name('users.')->group(function (){
Route::get('/users',[Usercontroller::class,'index'])->name('index');
Route::get('users/{user}',[Usercontroller::class,'show'])->name('show');
Route::post('/users',[Usercontroller::class,'store'])->name('store');
Route::patch('users/{user}',[Usercontroller::class,'update'])->name('update');
Route::delete('users/{user}',[Usercontroller::class,'destroy'])->name('delete');

});
