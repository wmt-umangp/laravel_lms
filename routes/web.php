<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;


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


    //for add author form display
    Route::get('/authors/addauthordisplay',[AuthorController::class,'getAddAuthorForm'])->name('addauthor');


    //for add author controller
    Route::post('/authors/addauthors',[AuthorController::class,'addAuthor'])->name('addauthorsave');

    // for author delete
    Route::delete('/authors/deleteauthors/{did}', [AuthorController::class, 'authorDelete'])->name('deleteauthor');

    //for show author details page
    Route::post('/authors/showauthordetails',[AuthorController::class,'showAuthorDetails'])->name('showauthordetails');

    //for show edit author form
    Route::get('/authors/showeditauthor/{uid}',[AuthorController::class,'showEditAuthor'])->name('showeditauthor');

    // for edit author controller
    Route::post('/authors/editauthor/{uid}',[AuthorController::class,'editAuthor'])->name('editauthor');

    //for author status
    Route::get('/authors/authorstatus',[AuthorController::class,'changeStatus'])->name('changestatus');

    //for Books Display
    Route::get('/books',[BookController::class,'getBooks'])->name('showbooks');

     //for add Book form display
     Route::get('/books/addbooksdisplay',[BookController::class,'getAddBookForm'])->name('addbook');

    //for add book controller
    Route::post('/books/addbooks',[BookController::class,'addBook'])->name('addbooksave');

    //for book delete
    Route::delete('/books/deletebooks/{bdid}', [BookController::class, 'bookDelete'])->name('deletebook');

     //for show edit Book form
     Route::get('/books/showeditbook/{buid}',[BookController::class,'showEditbook'])->name('showeditbook');

     // for edit book controller
     Route::post('/books/editbook/{buid}',[BookController::class,'editBook'])->name('editbook');
});



//for logout
Route::get('/logout',[UserController::class,'getLogout'])->name('logout');
