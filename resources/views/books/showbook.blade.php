@extends('layouts.master')

@section('title')
    List Books
@endsection

@section('content')
    @include('includes.toastr')
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
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
                            @foreach ($books as $b=>$bk)
                                <tr class="text-center">
                                    <td>{{$b+1}}</td>
                                    <td width="100px"><img src="{{asset(Storage::disk('local')->url('public/bookimg/'.$bk->book_image))}}" alt="book image" width="100" height="100" class="border border-1 border-light"></td>
                                    <td>{{$bk->book_title}}</td>
                                    <td class="text-center">
                                        @foreach ($bk->authors as $a)
                                            {!!Str::ucfirst($a->auth_fname)." ".Str::ucfirst($a->auth_lname).",<br>"!!}
                                       @endforeach
                                    </td>
                                    <td>{{"".$bk->book_price}}</td>
                                    <td>{{$bk->book_isbn}}</td>
                                    <td>{{$bk->book_status}}</td>
                                    <td class="text-center border-1 border-light">
                                        <div class="d-flex flex-row justify-content-evenly">
                                            <span> <a href="{{route('showeditbook',['buid'=>$bk->id])}}" class="btn"><i class="fa-solid fa-pen-to-square text-light"></i></a></span>
                                            <form method="POST" action="{{route('deletebook',['bdid'=>$bk->id])}}" style="display:inline !important;">
                                                @csrf
                                                    <input name="_method" type="hidden" value="DELETE" style="display: inline !important;" >
                                                    <button type="submit" class="btn show_confirm border-0" style="display: inline !important; "  data-toggle="tooltip" title='Delete'>
                                                        <i class="fa-solid fa-trash-can text-light"></i>
                                                    </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                      </tbody>
                </table>
              </div>
        </div>
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
           $('.show_confirm').click(function(event) {

          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
   </script>
@endsection
