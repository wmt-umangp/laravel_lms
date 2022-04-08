@extends('layouts.master')

@section('title')
    Edit Account
@endsection

@section('content')
<section class="row justify-content-center mt-5">
    <div class="col-md-6 col-md-offset-3 mt-5">
        <header class="mt-3 text-center"><h3>Update Account</h3></header>
        <form action="{{route('editUserAccount')}}" method="post" id="account" class="mt-5" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="fname">First Name</label>
                <input type="text" name="fname" class="form-control" value="{{ $user->fname }}" id="fname">
                @if ($errors->has('fname'))
                    <span class="text-danger">*{{ $errors->first('fname') }}</span>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" class="form-control" value="{{ $user->lname }}" id="lname">
                @if ($errors->has('lname'))
                    <span class="text-danger">*{{ $errors->first('lname') }}</span>
                @endif
            </div>
            <div class="form-group mb-4">
                <label for="image">Image</label>
                <span>
                    <i class="fa-solid fa-circle-info text-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="*Image Size Must be Less Than 3 MB" style="font-size: 20px"></i>
                </span>
                <input type="file" name="image" class="form-control" id="image">
                @if ($errors->has('image'))
                    <span class="text-danger">*{{ $errors->first('image') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary me-2">Update Account</button>
            <a class="btn btn-danger" href="{{ route('account') }}">Cancel</a>

        </form>
    </div>
</section>

@endsection

