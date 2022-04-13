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
            null,
            { "orderDataType": "dom-text-numeric" },
            { "orderDataType": "dom-text", type: 'string' },
            { "orderDataType": "dom-select" },
            { "orderDataType": "dom-checkbox" },
        ],
        "iDisplayLength": 5,
        "bLengthChange": false,
        "columnDefs": [
            { "orderable": false, "targets": [5] }
          ]
    });
    $('#showbook').DataTable({
        "iDisplayLength": 5,
        "bLengthChange": false,
        "columnDefs": [
            { "orderable": false, "targets": [5,6,7] }
          ]
    });
});
