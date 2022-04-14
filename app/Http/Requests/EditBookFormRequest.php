<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBookFormRequest extends FormRequest
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
            'b_title'=>'required',
            'b_pages'=>'required|numeric',
            'b_lang'=>'required|regex:/^[\pL\s\-]+$/u',
            'b_author'=>'required',
            'b_img' =>'required|image|mimes:jpg,png,jpeg,gif,svg|max:3000',
            'b_isbn'=>'required',
            'b_desc'=>'required|max:300',
            'b_price'=>'required|numeric',
        ];
    }
    public function messages(){
        return [
            'b_title.required'=>'Please Enter Book Title',
            'b_pages.required'=>'Please Enter Number of Page of Book',
            'b_pages.numeric'=>'Book Pages must be in digits',
            'b_lang.required'=>'Please Enter Book Language',
            'b_lang.regex'=>'Book Language must be in letters only',
            'b_author.required'=>'Please Select Book author',
            'b_img.required' =>'Please upload Book Image',
            'b_img.image' =>'Please upload valid image',
            'b_img.mimes' =>'allowed image types are: jpg,png,jpeg,gif,svg',
            'b_img.max' =>'Image size must be less than 3MB',
            'b_isbn.required'=>'Please Enter ISBN',
            'b_desc.required'=>'Please Enter Description of Book',
            'b_desc.max'=>'Maximum 300 characters allowed',
            'b_price.required'=>'Please Enter Price of Book',
            'b_price.numeric'=>'Book Price must be in digits only',
        ];
    }
}
