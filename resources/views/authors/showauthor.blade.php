@extends('layouts.master')

@section('title')
    List of Authors
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-12 mt-5">
            <div class="table-responsive mt-5">
                <table class="table table-bordered border-light mt-5 table-dark" id="showauthor">
                    <thead>
                        <tr class="text-center">
                          <th>#</th>
                          <th>Name</th>
                          <th>DOB</th>
                          <th>Address</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($author as $a)
                            <tr class="text-center">
                                <td>{{$a->id}}</td>
                                <td>{{$a->auth_fname}}</td>
                                <td>{{$a->auth_dob}}</td>
                                <td>{{$a->auth_address}}</td>
                                <td class="text-center">
                                    <span> <a href=""><i class="fa-solid fa-pen-to-square"></i></a></span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span> <a href=""><i class="fa-solid fa-trash-can"></i></a></span>
                                </td>
                            </tr>
                          @endforeach
                      </tbody>
                </table>
              </div>
        </div>
    </div>
@endsection
