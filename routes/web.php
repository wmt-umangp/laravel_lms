<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;


// for registration
Route::get('/signup',[UserController::class,'showsignup'])->name('showsignup');
Route::post('/postsignup',[UserController::class,'postSignUp'])->name('signup');

//for login
Route::get('/',[UserController::class,'showsignin'])->name('showsignin');
Route::post('/postsignin',[UserController::class,'postSignIn'])->name('signin');

//for dashboard
Route::get('/dashboard',[UserController::class,'getdashboard'])->name('dashboard');

//for logout
Route::get('/logout',[UserController::class,'getLogout'])->name('logout');

//for account
Route::get('/account',[UserController::class,'getAccount'])->name('account');

//for account edit display
Route::get('/account/editaccount',[UserController::class,'editAccountDisplay'])->name('editAccount');

//for edit User account display
Route::post('/account/editaccount/edituseraccount',[UserController::class,'postSaveAccount'])->name('editUserAccount');


//for authors display
Route::get('/authors',[AuthorController::class,'getAuthors'])->name('showauthors');
