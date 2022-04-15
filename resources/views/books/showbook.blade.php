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
                          <th class="border-1 border-light">#</th>
                          <th class="border-1 border-light">Image</th>
                          <th class="border-1 border-light">Title</th>
                          <th class="border-1 border-light">Author</th>
                          <th class="border-1 border-light">Price</th>
                          <th class="border-1 border-light">ISBN</th>
                          <th class="border-1 border-light">Status</th>
                          <th class="border-1 border-light">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach ($books as $b=>$bk)
                                <tr class="text-center">
                                    <td class="border-1 border-light">{{$b+1}}</td>
                                    <td width="100px" class="border-1 border-light"> <a href="#" data-showid={{$bk->id}} class="text-decoration-none text-light showbook"><img src="{{asset(Storage::disk('local')->url('public/bookimg/'.$bk->book_image))}}" alt="book image" width="100" height="100" class="border border-1 border-light"></a></td>
                                    <td class="border-1 border-light">{{$bk->book_title}}</td>
                                    <td class="text-center border-1 border-light">
                                        @foreach ($bk->authors as $a)
                                            {!!Str::ucfirst($a->auth_fname)." ".Str::ucfirst($a->auth_lname).",<br>"!!}
                                       @endforeach
                                    </td>
                                    <td class="border-1 border-light">
                                        @php
                                            setlocale(LC_MONETARY, 'en_IN.UTF-8');
                                            echo money_format('%n',$bk->book_price);
                                        @endphp
                                    </td>
                                    <td class="border-1 border-light">{{$bk->book_isbn}}</td>
                                    <td class="border-1 border-light">
                                        <input data-id="{{$bk->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $bk->book_status ? 'checked' : '' }}>
                                    </td>
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

   {{-- Modal for show Books Details--}}
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Book Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
               <table class="table table-striped table-dark table-hover">
                    <tr>
                        <td colspan="2" class="text-center">
                            <img src="" alt="Book Image" class="book_img border border-2 border-light" width="200" height="200">
                        </td>
                    </tr>
                    <tr>
                       <td>Book Title</td>
                       <td class="book_title"></td>
                   </tr>
                   <tr>
                       <td>Book Pages</td>
                       <td class="book_pages"></td>
                   </tr>
                   <tr>
                       <td>Book Language</td>
                       <td class="book_lang"></td>
                   </tr>
                   <tr>
                       <td>Book ISBN</td>
                       <td class="book_isbn"></td>
                   </tr>
                   <tr>
                       <td>Book Description</td>
                       <td class="book_desc"></td>
                   </tr>
                   <tr>
                       <td>Book Price</td>
                       <td class="book_price"></td>
                   </tr>
                   <tr>
                       <td>Book Status</td>
                       <td class="book_status"></td>
                   </tr>
               </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // for show book details
    var showroute="{{route('showbookdetails')}}"
    var status=""
    var bookimgpath="{{asset(Storage::disk('local')->url('public/bookimg/'))}}"+"/"
    $('.showbook').click(function(event){
        console.log("bye",bookimgpath);
        console.log('Hello');
        event.preventDefault();
        bookId=$(this).attr("data-showid");
        console.log(bookId);
        $.ajax({
            url:showroute,
            method:"POST",
            data:{
                bookid:bookId,
            },
            success:function(data){
                console.log(data);
                $('.book_img').attr('src',bookimgpath+data['book_image']);
                $('.book_title').html(data['book_title']);
                $('.book_pages').html(data['book_pages']);
                $('.book_lang').html(data['book_language']);
                $('.book_isbn').html(data['book_isbn']);
                $('.book_desc').html(data['book_desc']);
                $('.book_price').html(data['book_price']);
                if(data['book_status']==1){
                    status="Active"
                }
                else{
                    status="Inactive"
                }
                $('.book_status').html(status);

                $('#exampleModal').modal('show');
            }
        });
    });

</script>
   <script>
        // for book status
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var book_id = $(this).data('id');
        console.log(status,book_id);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{route('changebookstatus')}}",
            data: {'status': status, 'book_id': book_id},
            success: function(data){
              console.log(data.success)
            }
        });
        // console.log("hello");
    });
   </script>
@endsection
