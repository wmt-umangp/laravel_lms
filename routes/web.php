<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;


// for registration
Route::get('/signup',[UserController::class,'showsignup'])->name('showsignup')->middleware('access');
Route::post('/postsignup',[UserController::class,'postSignUp'])->name('signup');

//for login
Route::get('/',[UserController::class,'showsignin'])->name('showsignin')->middleware('access');
Route::post('/postsignin',[UserController::class,'postSignIn'])->name('signin');

Route::middleware('auth')->group(function () {
    //for dashboard
    Route::get('/dashboard',[UserController::class,'getdashboard'])->name('dashboard');

    //for account
    Route::get('/account',[UserController::class,'getAccount'])->name('account');

    //for account edit display
    Route::get('/account/editaccount',[UserController::class,'editAccountDisplay'])->name('editAccount');

    //for edit User account display
    Route::post('/account/editaccount/edituseraccount',[UserController::class,'postSaveAccount'])->name('editUserAccount');


    //for authors display
    Route::get('/authors',[AuthorController::class,'getAuthors'])->name('showauthors');


    //for author form display
    Route::get('/authors/addauthordisplay',[AuthorController::class,'getAddAuthorForm'])->name('addauthor');


    //for add author controller
    Route::post('/authors/addauthors',[AuthorController::class,'addAuthor'])->name('addauthorsave');

    // for author delete
    Route::delete('/authors/deleteauthors/{did}', [AuthorController::class, 'authorDelete'])->name('deleteauthor');

    Route::post('/authors/showauthordetails',[AuthorController::class,'showAuthorDetails'])->name('showauthordetails');
});



//for logout
Route::get('/logout',[UserController::class,'getLogout'])->name('logout');
