$(document).ready(function () {
    $('#datatable').dataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        "aaSorting": [[0,'asc']],
        "lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "Semua"]]
    });
});

$('#tgl_pinjam').datepicker({
    format: 'yyyy-mm-dd',
    startDate: "+0d",
    endDate: "+2d",
    autoclose: true
});

$('.input-daterange').datepicker({
    format: 'yyyy-mm-dd',
    startDate: "+0d",
    autoclose: true
});

$("#cetak").click(function(){
    window.print();
});