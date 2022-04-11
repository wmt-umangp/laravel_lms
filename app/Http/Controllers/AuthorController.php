<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AddAuthorFormRequest;
class AuthorController extends Controller
{
    public function getAuthors(){

        return view('authors.showauthor',[AuthorController::class,'author'=>Author::all()]);
    }
    public function getAddAuthorForm(){
        return view('authors.showaddauthorform');
    }
    public function addAuthor(AddAuthorFormRequest $request){
        $fname=$request->input('a_fname');
        $lname=$request->input('a_lname');
        $dob=$request->input('a_dob');
        $gender=$request->input('a_gen');
        $address=$request->input('a_address');
        $mobile=$request->input('a_mobile_no');
        $desc=$request->input('a_desc');
        $status=$request->input('a_status');
        if($status=='on'){
            $status=1;
        }else{
            $status=0;
        }
        $author=new Author;
        $author->auth_fname=$fname;
        $author->auth_lname=$lname;
        $author->auth_dob=$dob;
        $author->auth_gen=$gender;
        $author->auth_address=$address;
        $author->auth_mobile=$mobile;
        $author->auth_desc=$desc;
        $author->auth_status=$status;

        $author->save();
        return redirect()->route('showauthors')->with('success','Author added Successfully!!');
    }
    public function authorDelete($id){
        Author::find($id)->delete();

        return back()->with('success','Author Deleted Successfully!!');
    }
    public function showAuthorDetails(Request $request){
        $auth_id=$request['authorid'];
        $author=Author::find($auth_id);
        return response()->json($author);
    }
}
