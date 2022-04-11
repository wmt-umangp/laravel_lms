<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAuthorFormRequest extends FormRequest
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
            'a_fname'=>'required|max:120|regex:/^[\pL\s\-]+$/u',
            'a_lname'=>'required|max:120|regex:/^[\pL\s\-]+$/u',
            'a_dob'=>'required',
            'a_gen'=>'required',
            'a_address'=>'required',
            'a_mobile_no'=>'required|min:10|numeric',
            'a_desc'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'a_fname.required'=>'Please Enter First Name',
            'a_fname.max'=>'Maximum 120 Characters allowed',
            'a_fname.regex'=>'First Name must be in characters only',
            'a_lname.required'=>'Please Enter Last Name',
            'a_lname.max'=>'Maximum 120 Characters allowed',
            'a_lname.regex'=>'Last Name must be in characters only',
            'a_dob.required'=>'Please Choose Date of Birth',
            'a_gen.required'=>'Please Choose Gender',
            'a_address.required'=>'Please Enter Address',
            'a_mobile_no.required'=>'Please Enter Mobile No.',
            'a_mobile_no.min'=>'Minimum 10 characters required',
            'a_mobile_no.numeric'=>'Mobile Number Must be in Digits only',
            'a_desc.required'=>'Please Enter Author\'s Description'
        ];
    }
}
