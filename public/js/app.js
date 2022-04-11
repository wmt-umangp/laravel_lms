$(document).ready(function(){
    // var postBodyElement=null;
    $("[data-bs-toggle='tooltip']").tooltip();

    $('#showauthor').DataTable({
        "iDisplayLength": 5,
        "bLengthChange": false,
        "columnDefs": [
            { "orderable": false, "targets": 4 }
          ]
    });
});
