@extends('layouts.master')

@section('title')
    List Books
@endsection

@section('content')
    @include('includes.toastr')

    <div class="row mt-5">
        <div class="col-6 offset-3 text-center mt-5">
            <h3 class="mt-5">List of Books</h3>
        </div>
        <div class="col-3 mt-5 text-end">
            <a type="button" href="{{route('addbook')}}" class="mt-5 btn btn-success">
                <i class="fa-solid fa-plus"></i>
                Add Book
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive mt-5">
                <table class="table table-bordered border-light mt-5 table-dark" id="showbook">
                    <thead>
                        <tr class="text-center">
                          <th>#</th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Author</th>
                          <th>Price</th>
                          <th>ISBN</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                </table>
              </div>
        </div>
    </div>
@endsection
