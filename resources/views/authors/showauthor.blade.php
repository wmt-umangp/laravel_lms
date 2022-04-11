@extends('layouts.master')

@section('title')
    List of Authors
@endsection

@section('content')
    @include('includes.toastr')
    <div class="row mt-5">
        <div class="col-6 offset-3 text-center mt-5">
            <h3 class="mt-5">List of Authors</h3>
        </div>
        <div class="col-3 mt-5 text-end">
            <a type="button" href="{{route('addauthor')}}" class="mt-5 btn btn-success">
                <i class="fa-solid fa-plus"></i>
                Add Author
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
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
                          @foreach ($author as $a=>$ab)
                            <tr class="text-center">
                                <td>{{$a+1}}</td>
                                <td>{{$ab->auth_fname}}</td>
                                <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($ab->auth_dob))->format('d-m-Y')}}</td>
                                <td class="text-break" style="width:500px;">{{$ab->auth_address}}</td>
                                <td class="text-center">
                                    <span> <a href="#" data-showid={{$ab->id}} class="showauthor"><i class="fa-solid fa-circle-info text-light"></i></a></span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span> <a href=""><i class="fa-solid fa-pen-to-square text-light"></i></a></span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <form method="POST" action="{{route('deleteauthor',['did'=>$ab->id])}}" style="display:inline !important;">
                                        @csrf
                                            <input name="_method" type="hidden" value="DELETE" style="display: inline !important;" >
                                            <button type="submit" class="btn show_confirm border-0" style="display: inline !important; "  data-toggle="tooltip" title='Delete'>
                                                <i class="fa-solid fa-trash-can text-light"></i>
                                            </button>
                                    </form>
                                </td>
                            </tr>
                          @endforeach
                      </tbody>
                </table>
              </div>
        </div>
    </div>
    <script type="text/javascript">
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

 {{-- Modal for show Author Details--}}
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editmodal">
                    <div class="form-group">
                        <label for="post-body">Edit The Post</label>
                        <textarea name="post-body" id="post-body" cols="30" rows="5" class="form-control" style="resize:none;"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="modal-save">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    var showroute="{{route('showauthordetails')}}"
    var token=""
    $('.showauthor').click(function(event){
        event.preventDefault();
        authorId=$(this).attr("data-showid");
        console.log(authorId);
        $.ajax({
            url:showroute,
            method:"POST",
            token:token,
            data:{
                authorid:authorId,
            },
            success:function(data){
                console.log('success:');
            }
        });
    });
</script>

@endsection
