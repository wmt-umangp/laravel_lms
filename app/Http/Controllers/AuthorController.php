<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AddAuthorFormRequest;
use App\Http\Requests\EditAuthorFormRequest;
use Auth;
class AuthorController extends Controller
{
    public function getAuthors(){
        return view('authors.showauthor',['author'=>Author::orderBy('created_at','desc')->get()]);
    }
    public function getAddAuthorForm(){
        return view('authors.showaddauthorform');
    }
    public function addAuthor(AddAuthorFormRequest $request){
        // if($request->a_status==1){
        //     $status=1;
        // }else{
        //     $status=0;
        // }
        $author=new Author;
        $author->auth_fname=$request->a_fname;
        $author->auth_lname=$request->a_lname;
        $author->auth_dob=$request->a_dob;
        $author->auth_gen=$request->a_gen;
        $author->auth_address=$request->a_address;
        $author->auth_mobile=$request->a_mobile_no;
        $author->auth_desc=$request->a_desc;
        $author->user_id=Auth::user()->id;
        // $author->auth_status=$status;
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
    public function showEditAuthor($id){
        $author=Author::find($id);
        return view('authors.showeditauthor',['author'=>$author]);
    }
    public function editAuthor(EditAuthorFormRequest $request,$id){
        if($request->a_status==1){
            $status=1;
        }else{
            $status=0;
        }
        $author=Author::find($id);
        $author->auth_fname=$request->a_fname;
        $author->auth_lname=$request->a_lname;
        $author->auth_dob=$request->a_dob;
        $author->auth_gen=$request->a_gen;
        $author->auth_address=$request->a_address;
        $author->auth_mobile=$request->a_mobile_no;
        $author->auth_desc=$request->a_desc;
        $author->auth_status=$status;
        $author->update();
        return redirect()->route('showauthors')->with('success','Author Details Updated Successfully!!');

    }
    public function changeStatus(Request $request)
    {
        $author = Author::find($request->author_id);
        $author->auth_status = $request->status;
        $author->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
