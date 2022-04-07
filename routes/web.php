<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// for registration
Route::get('/signup',[UserController::class,'showsignup'])->name('showsignup');
Route::post('/postsignup',[UserController::class,'postSignUp'])->name('signup');

//for login
Route::get('/',[UserController::class,'showsignin'])->name('showsignin');
// Route::post('/postsignin',[UserController::class,'postSignIn'])->name('signin');
