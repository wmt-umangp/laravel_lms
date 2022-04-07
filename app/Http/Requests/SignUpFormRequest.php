<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'fname' => 'required|regex:/^[\pL\s\-]+$/u',
                'lname' => 'required|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'cpassword' => 'required|same:password|min:6',
        ];
    }
    public function messages(){
            return [
                'fname.required' => 'Please Enter Name',
                'fname.regex' => 'First Name must be in letters only',
                'lname.required' => 'Please Enter Name',
                'lname.regex' => 'Last Name must be in letters only',
                'email.required' => 'Please Enter Email',
                'email.email'=>'Please Enter Valid Email',
                'email.unique'=> 'Email Already Exists!!',
                'password.required' => 'Please Enter Password',
                'password.min'=>'Password must be 6 character long',
                'cpassword.required' => 'Please Enter Confirm Password',
                'cpassword.same'=>'Confirm Password must be same as Password',
                'cpassword.min'=>'Confirm Password must be 6 character long',
            ];
    }
}
