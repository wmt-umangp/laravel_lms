@extends('layouts.master')
@section('title')
    Dashboard
@endsection


@section('bg_img')
    <img src="https://www.sciencenewsforstudents.org/wp-content/uploads/2019/11/860_main_library_bacteria.png" id="img">
    <div class="d-flex justify-content-center w-100 text-light" style="position: absolute;top:50%;">
        <div class="">
            <h1>Welcome, {{Auth::user()->fname. " " .Auth::user()->lname}}</h1>
        </div>
    </div>
@endsection

