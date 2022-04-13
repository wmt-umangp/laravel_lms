@extends('layouts.master')

@section('title')
    List of Authors
@endsection

@section('content')
    @include('includes.toastr')
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
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
                <table class="table border-2 border-light mt-5 table-dark" id="showauthor">
                    <thead>
                        <tr class="text-center">
                          <th class="border-1 border-light">#</th>
                          <th class="border-1 border-light">Name</th>
                          <th class="border-1 border-light">DOB</th>
                          <th class="border-1 border-light">Address</th>
                          <th class="border-1 border-light">Status</th>
                          <th class="border-1 border-light">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($author as $a=>$ab)
                            <tr class="text-center">
                                <td class="border-1 border-light">{{$a+1}}</td>
                                <td class="border-1 border-light"> <a href="#" data-showid={{$ab->id}} class="text-decoration-none text-light showauthor">{{$ab->auth_fname}}</a></td>
                                <td class="border-1 border-light">{{ \Carbon\Carbon::createFromTimestamp(strtotime($ab->auth_dob))->format('d-m-Y')}}</td>
                                <td class="text-break border-1 border-light" style="width:500px;"><pre><span style="font-size:18px;font-family: Sans-serif">{{$ab->auth_address}}</span></pre></td>
                                <td class="border-1 border-light">
                                    <input data-id="{{$ab->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $ab->auth_status ? 'checked' : '' }}>
                                </td>
                                <td class="text-center border-1 border-light">
                                    <div class="d-flex flex-row justify-content-evenly">
                                        <span> <a href="{{route('showeditauthor',['uid'=>$ab->id])}}" class="btn"><i class="fa-solid fa-pen-to-square text-light"></i></a></span>
                                        <form method="POST" action="{{route('deleteauthor',['did'=>$ab->id])}}" style="display:inline !important;">
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

 {{-- Modal for show Author Details--}}
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Author Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <table class="table table-striped table-dark table-hover">
                   <tr>
                       <td style="width:300px;">Author's First Name: </td>
                       <td><span class="fname "></span></td>
                   </tr>
                   <tr>
                       <td>Author's Last Name: </td>
                       <td><span class="lname"></span></td>
                   </tr>
                   <tr>
                       <td>Author's Date of Birth: </td>
                       <td><span class="dob"></span></td>
                   </tr>
                   <tr>
                       <td>Author's Gender: </td>
                       <td><span class="gen"></span></td>
                   </tr>
                   <tr>
                       <td>Author's Address: </td>
                       <td><span class="address"></span></td>
                   </tr>
                   <tr>
                       <td>Author's Mobile: </td>
                       <td><span class="mobile"></span></td>
                   </tr>
                   <tr>
                       <td>Author's Description: </td>
                       <td><span class="desc"></span></td>
                   </tr>
                   <tr>
                       <td>Author's Status: </td>
                       <td><span class="status"></span></td>
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
    var showroute="{{route('showauthordetails')}}"
    var status=""
    $('.showauthor').click(function(event){
        event.preventDefault();
        authorId=$(this).attr("data-showid");
        console.log(authorId);
        $.ajax({
            url:showroute,
            method:"POST",
            data:{
                authorid:authorId,
            },
            success:function(data){
                // console.log('success:',data['auth_fname']);
                $('.fname').html(data['auth_fname']);
                $('.lname').html(data['auth_lname']);
                $('.dob').html($.date(data['auth_dob']));
                $('.gen').html(data['auth_gen']);
                $('.address').html(data['auth_address']);
                $('.mobile').html(data['auth_mobile']);
                $('.desc').html(data['auth_desc']);
                if(data['auth_status']==1){
                    status="Active"

                }
                else{
                    status="Inactive"

                }
                $('.status').html(status);
                $('#exampleModal').modal('show');
            }
        });
        $.date = function(dateObject) {
            var d = new Date(dateObject);
            var day = d.getDate();
            var month = d.getMonth() + 1;
            var year = d.getFullYear();
            if (day < 10) {
                day = "0" + day;
            }
            if (month < 10) {
                month = "0" + month;
            }
            var date = day + "/" + month + "/" + year;

            return date;
        };
    });


    // for author status
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var author_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{route('changestatus')}}",
            data: {'status': status, 'author_id': author_id},
            success: function(data){
              console.log(data.success)
            }
        });
    });
</script>

@endsection
