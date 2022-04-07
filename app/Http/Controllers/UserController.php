<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignUpFormRequest;
use App\Models\User;
use Auth;
use Hash;
use Session;

class UserController extends Controller
{
    //shows signup page
    public function showsignup(){
        return view('signup');
    }

    //for signup process
    public function postSignUp(SignUpFormRequest $request){
        $request->validated();
        echo "hello";
    }

    //shows signin page
    public function showsignin(){
        return view('signin');
    }
}
