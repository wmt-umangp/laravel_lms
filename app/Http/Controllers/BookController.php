<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddBookFormRequest;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    public function getBooks(){
        return view('books.showbook',['books'=>Book::orderBy('created_at','desc')->get()]);
    }
    public function getAddBookForm(){
        $author=Author::all();
        return view('books.showaddbookform',['author'=>$author]);
    }
    public function addBook(AddBookFormRequest $request){
        // $book=$request->all();
        // echo "<pre>";
        // print_r($book);
        if($request->b_status==1){
            $status=1;
        }else{
            $status=0;
        }
        $book=new Book;
        $files = $request->file('b_img');
        $folder='public/bookimg/';
        $filename=$files->getClientOriginalName();
        $files->storeAs($folder,$filename);
        $book->book_title=$request->b_title;
        $book->book_pages=$request->b_pages;
        $book->book_language=$request->b_lang;
        $book->book_isbn=$request->b_isbn;
        $book->book_image=$filename;
        $book->book_desc=$request->b_desc;
        $book->book_price=$request->b_price;
        $book->book_status=$status;
        $book->save();
        $book->authors()->attach($request->b_author);
        return redirect()->route('showbooks')->with('success','Book added Successfully!!');
    }
}
