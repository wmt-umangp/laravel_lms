<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserAccountFormRequest extends FormRequest
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
            'fname'=>'required|max:120|regex:/^[\pL\s\-]+$/u',
            'lname'=>'required|max:120|regex:/^[\pL\s\-]+$/u',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3000',
        ];
    }
    public function messages()
    {
        return [
            'fname.required'=>'Please Enter First Name',
            'fname.max'=>'Maximum 120 characters allowed!!',
            'fname.regex'=>'First Name Must be in letters only',
            'lname.required'=>'Please Enter Last Name',
            'lname.max'=>'Maximum 120 characters allowed!!',
            'lname.regex'=>'Last Name Must be in letters only',
            'image.required'=>'Please Upload Image',
            'image.image'=>'File Must be image',
            'image.mimes'=>'Supported Image formats are jpg, png, jpeg, gif, svg',
            'image.max'=>'Image Size Must Be Less Than 3MB'
        ];
    }
}
