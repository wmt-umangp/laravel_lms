@extends('layouts.master')

@section('title')
   Add Author
@endsection
@section('content')
<div class="row mt-5">
    <div class="col mt-5 mb-5">
        <div class="card mt-5 mb-5 rounded-5 shadow-lg">
            <h2 class="card-b_img header rounded-5 p-3 text-center bg-primary text-white">Add Authors</h2>
            <div class="card-body">
                <form action="{{route('addauthorsave')}}" id="add_author_form" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="a_fname" class="mb-1">Author's First Name</label>
                           <input type="text" class="form-control" id="a_fname" placeholder="Enter Author's First Name"
                            name="a_fname">
                        @if ($errors->has('a_fname'))
                            <span class="text-danger">*{{ $errors->first('a_fname') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="a_lname" class="mb-1">Author's Last Name</label>
                        <input type="text" class="form-control" id="a_lname" placeholder="Enter Author's Last Name"
                            name="a_lname">
                        @if ($errors->has('a_lname'))
                            <span class="text-danger">*{{ $errors->first('a_lname') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="a_dob" class="mb-1">Author's DOB</label>
                        <input type="date" class="form-control" id="a_dob" placeholder="Enter Author's Date of Birth"
                            name="a_dob">
                        @if ($errors->has('a_dob'))
                            <span class="text-danger">*{{ $errors->first('a_dob') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="a_gen" class="mb-1">Author's Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="a_gen" id="a_gen_1" value="Male">
                            <label class="form-check-label" for="a_gen_1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="a_gen" id="a_gen_2" value="Female">
                            <label class="form-check-label" for="a_gen_2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="a_gen" id="a_gen_3" value="Other">
                            <label class="form-check-label" for="a_gen_3">Other</label>
                        </div>
                        <label for="a_gen" class="error" style="display:none;"></label>
                    @if ($errors->has('a_gen'))
                        <span class="text-danger">*{{ $errors->first('a_gen') }}</span>
                    @endif

                    </div>
                    <div class="mb-3 mt-3">
                        <label for="a_address" class="mb-1">Author's Address</label>
                        <textarea name="a_address" id="a_address" cols="30" rows="2"  placeholder="Enter Author's Address" class="form-control"></textarea>
                    @if ($errors->has('a_address'))
                        <span class="text-danger">*{{ $errors->first('a_address') }}</span>
                    @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="a_mobile_no" class="mb-1">Authors Mobile No</label>
                        <input type="text" class="form-control" id="a_mobile_no" placeholder="Enter Author's Mobile No"
                            name="a_mobile_no">
                        @if ($errors->has('a_mobile_no'))
                            <span class="text-danger">*{{ $errors->first('a_mobile_no') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="a_desc" class="mb-1">Author's Description</label>
                        <textarea name="a_desc" id="a_desc" cols="30" rows="2"  placeholder="Enter Author's Description" class="form-control"></textarea>
                    @if ($errors->has('a_desc'))
                        <span class="text-danger">*{{ $errors->first('a_desc') }}</span>
                    @endif
                    </div>

                    {{-- <div class="mb-3 mt-3">
                        <div class="row">
                            <div class="col-1">  <label for="a_status" class="mb-1">Status: </label></div>
                            <div class="col-3 col-sm-1">
                                <label class="ms-4 ms-sm-0 me-0">Inactive</label>
                            </div>
                            <div class="col-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="a_status"  value="1" name="a_status" >
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <button type="submit" class="btn btn-primary" id="add_author" name="add_author">Add
                        Author</button>
                    <a type="button" href="{{route('showauthors')}}" class="btn btn-danger" id="a_cancel" name="a_cancel">cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

