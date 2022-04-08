<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
class AuthorController extends Controller
{
    public function getAuthors(){
        return view('authors.showauthor',[AuthorController::class,'author'=>Author::all()]);
    }
}
