$(document).ready(function(){

    $.fn.dataTable.ext.order['dom-checkbox'] = function  ( settings, col )
        {
            return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
            return $('input', td).prop('checked') ? '1' : '0';
        } );
    }
    // var postBodyElement=null;
    $("[data-bs-toggle='tooltip']").tooltip();

    $('#showauthor').DataTable({
        "columns": [
            null,null,null,null,{ "orderDataType": "dom-checkbox" },
        ],
        "iDisplayLength": 5,
        "bLengthChange": false,
        "columnDefs": [
            { "orderable": false, "targets": [5] }
          ]
    });
    $('#showbook').DataTable({
          "columns": [null,null,null,null,null,null,
            { "orderDataType": "dom-checkbox" },
        ],
        "iDisplayLength": 5,
        "bLengthChange": false,
        "columnDefs": [
            { "orderable": false, "targets": [7] }
        ],
    });

    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
    removeItemButton: true,
    maxItemCount:5,
    searchResultLimit:10,
    renderChoiceLimit:10
    });
});
