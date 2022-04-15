<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddBookFormRequest;
use App\Http\Requests\EditBookFormRequest;
use App\Models\Book;
use App\Models\Author;
use Storage;
use Auth;
// use DB;

class BookController extends Controller
{
    public function getBooks(){
        $books=Book::orderBy('created_at','desc')->get();
        return view('books.showbook',['books'=>$books]);
    }
    public function getAddBookForm(){
        $author=Author::all();
        return view('books.showaddbookform',['author'=>$author]);
    }
    public function addBook(AddBookFormRequest $request){
        // $book=$request->all();
        // echo "<pre>";
        // print_r($book);
        $book=new Book;
        $files = $request->file('b_img');
        $folder='public/bookimg/';
        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }
        $filename=$files->getClientOriginalName();
        $files->storeAs($folder,$filename);
        $book->book_title=$request->b_title;
        $book->book_pages=$request->b_pages;
        $book->book_language=$request->b_lang;
        $book->book_isbn=$request->b_isbn;
        $book->book_image=$filename;
        $book->book_desc=$request->b_desc;
        $book->book_price=$request->b_price;
        $book->user_id=Auth::user()->id;
        $book->save();
        $book->authors()->attach($request->b_author);
        return redirect()->route('showbooks')->with('success','Book added Successfully!!');
    }
    public function bookDelete($id){
        $book=Book::find($id);
        $folder='public/bookimg/';
        if($book->book_image != ''  && $book->book_image != null){
            $file_old = $folder.$book->book_image;
            // dd($file_old);
            if(Storage::exists($file_old)){
                Storage::delete($file_old);
            }else{
                dd('File not found.');
            }
        }
        $book->delete();
        return back()->with('success','Book Deleted Successfully!!');
    }
    public function showEditBook($id){
        $book=Book::find($id);
        // echo "<pre>";
        // dd($book);

        $author=Author::all();
        return view('books.showeditbook', array('book' => $book,'author' => $author));
    }
    public function editBook(EditBookFormRequest $request,$id){
        if($request->b_status==1){
            $status=1;
        }else{
            $status=0;
        }
        $folder='public/bookimg/';
        $book=Book::find($id);
        if($book->book_image != ''  && $book->book_image != null){
            $file_old = $folder.$book->book_image;
            if(Storage::exists($file_old)){
                Storage::delete($file_old);
            }else{
                dd('File not found.');
            }
        }
        $files = $request->file('b_img');
        $filename=$files->getClientOriginalName();
        $files->storeAs($folder,$filename);
        $book->book_title=$request->b_title;
        $book->book_pages=$request->b_pages;
        $book->book_language=$request->b_lang;
        $book->book_image=$filename;
        $book->book_isbn=$request->b_isbn;
        $book->book_desc=$request->b_desc;
        $book->book_price=$request->b_price;
        $book->book_status=$status;
        // DB::enableQueryLog();
        $book->update();
        // dd(DB::getQueryLog());
        $book->authors()->sync($request->b_author);
        return redirect()->route('showbooks')->with('success','Book Details Updated Successfully!!');
    }
    public function changebookStatus(Request $request){
        $book = Book::find($request->book_id);
        $book->book_status = $request->status;
        $book->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
    public function showBookDetails(Request $request){
        $book_id=$request['bookid'];
        $book=Book::find($book_id);
        return response()->json($book);
    }
}
