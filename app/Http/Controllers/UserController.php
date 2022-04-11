<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignUpFormRequest;
use App\Http\Requests\SignInFormRequest;
use App\Http\Requests\EditUserAccountFormRequest;
use App\Models\User;
use Auth;
use Hash;
use Session;
use Storage;

class UserController extends Controller
{
    //shows signup page
    public function showsignup(){
        return view('signup');
    }

    //for signup process
    public function postSignUp(SignUpFormRequest $request){
        $fname=$request->input('fname');
        $lname=$request->input('lname');
        $email=$request->input('email');
        $password=Hash::make($request->input('password'));

        $user=new User;

        $user->fname=$fname;
        $user->lname=$lname;
        $user->email=$email;
        $user->password=$password;
        $user->save();

        Auth::login($user);
        Session::put('log',$email);
        // dd($user);
        return redirect()->route('dashboard')->with('rmsg','Great! You have Successfully loggedin');;
    }

    //shows signin page
    public function showsignin(){
        return view('signin');
    }
    public function postSignIn(SignInFormRequest $req){
        // $req->validated();
        $email=$req->input('email');
        $password=$req->input('password');
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            Session::put('log',$email);
            return redirect()->route('dashboard')->with('logined','You have Successfully loggedin');
        }
        return redirect()->back()->with('logerror','Invalid User Credentials');
    }
    public function getDashboard(){
        return view('dashboard');
    }
    public function getAccount(){
        return view('account',['user'=>Auth::user()]);
    }
    public function editAccountDisplay(){
        return view('editaccount',['user'=>Auth::user()]);
    }
    public function postSaveAccount(EditUserAccountFormRequest $request){
        $user=Auth::user();
        $files = $request->file('image');
        $folder='public/images/User-'.Auth::user()->id.'/';
        $filename=$files->getClientOriginalName();
        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }
        if (!empty($files)) {
            $files->storeAs($folder,$filename);
            $user->fname=$request->input('fname');
            $user->lname=$request->input('lname');
            $user->profile_img_path=$files->getClientOriginalName();
            $user->update();
        }
        return redirect()->route('account');
    }
    public function getLogout(){
        Auth::logout();
        session::flush();
        return redirect()->route('showsignin');
    }
}
