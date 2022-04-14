@extends('layouts.master')

@section('title')
    Edit Book Details
@endsection
@section('content')
<div class="row mt-5">
    <div class="col mt-5 mb-5">
        <div class="card mt-5 mb-5 rounded-5 shadow-lg">
            <h2 class="card-b_img header rounded-5 p-3 text-center bg-primary text-white">Edit Book's Details</h2>
            <div class="card-body">
                <form action="{{route('editbook',['buid'=>$book->id])}}" id="edit_book_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="b_title" class="mb-1">Book Title</label>
                        <input type="text" class="form-control" id="b_title" placeholder="Enter Book Title"
                            name="b_title" value="{{$book->book_title}}">
                        @if ($errors->has('b_title'))
                            <span class="text-danger">*{{ $errors->first('b_title') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="b_pages" class="mb-1">Book Pages</label>
                        <input type="text" class="form-control" id="b_pages" placeholder="Enter No. Book Pages"
                            name="b_pages" value="{{$book->book_pages}}">
                            @if ($errors->has('b_pages'))
                            <span class="text-danger">*{{ $errors->first('b_pages') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="b_lang" class="mb-1">Book Language</label>
                        <input type="text" class="form-control" id="b_lang" placeholder="Enter Book Language"
                            name="b_lang" value="{{$book->book_language}}">
                        @if ($errors->has('b_lang'))
                            <span class="text-danger">*{{ $errors->first('b_lang') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="b_author" class="mb-1">Book Author</label>

                        <select name="b_author[]"  id="choices-multiple-remove-button" placeholder="Select Book's Authors" multiple>
                            @foreach($author as $a)
                                <option value="{{ $a->id }}" @foreach($book->authors as $auth){{$auth->pivot->author_id == $a->id ? 'selected': ''}} @endforeach>
                                    {{ $a->auth_fname }} {{" ".$a->auth_lname}}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('b_author'))
                            <span class="text-danger">*{{ $errors->first('b_author') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="b_img" class="mb-1">Book Image</label>
                        <input type="file" class="form-control" id="b_img" placeholder="Upload Image of Book" name="b_img">
                        @if ($errors->has('b_img'))
                            <span class="text-danger">*{{ $errors->first('b_img') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="b_isbn" class="mb-1">Book ISBN</label>
                        <input type="text" class="form-control" id="b_isbn" placeholder="Enter Book ISBN" name="b_isbn"  value="{{$book->book_isbn}}">
                        @if ($errors->has('b_isbn'))
                            <span class="text-danger">*{{ $errors->first('b_isbn') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="b_desc" class="mb-1">Book Description</label>
                        <textarea name="b_desc" id="b_desc" cols="30" rows="2" class="form-control" placeholder="Enter Book Description">{{$book->book_desc}}</textarea>
                        @if ($errors->has('b_desc'))
                            <span class="text-danger">*{{ $errors->first('b_desc') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="b_price" class="mb-1">Book Price</label>
                        <input type="text" class="form-control" id="b_price" placeholder="Enter Book Price"
                            name="b_price"  value="{{$book->book_price}}">
                        @if ($errors->has('b_price'))
                            <span class="text-danger">*{{ $errors->first('b_price') }}</span>
                        @endif
                    </div>


                    <div class="mb-3 mt-3">
                        <div class="row">
                            <div class="col-1"> <label for="b_status" class="mb-1">Status: </label></div>
                            <div class="col-3 col-sm-1">
                                <label class="ms-4 ms-sm-0 me-0">Inactive</label>
                            </div>
                            <div class="col-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="b_status"
                                       value="1" name="b_status">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" id="add_book" name="add_book">Edit
                        Book</button>
                    <a type="button" href="{{route('showbooks')}}" class="btn btn-danger" id="b_cancel"
                        name="b_cancel">cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

