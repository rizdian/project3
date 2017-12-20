// A $( document ).ready() block.
$(document).ready(function () {
    if ($('#status').val() === 'tetap'){
        $('#lama_kontrak').prop("readonly", true);
        $('#lama_kontrak').val(0);
    }
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

if ($('#btn').val() === 'Update') {
    var status = $('#temp_status').val();
    if (status === 'tetap') {
        $('#status').val('tetap');
        $('#lama_kontrak').prop("disabled", true);
    } else {
        $('#status').val('kontrak');
        $('#lama_kontrak').prop("disabled", false);
    }
}

$('#status').on('change', function(){
    if ($('#status').val() === 'tetap'){
        $('#lama_kontrak').prop("disabled", true);
        $('#lama_kontrak').val('0');
    }else {
        $('#lama_kontrak').prop("disabled", false);
    }
});

$('#tahun_masuk').datepicker({
    minViewMode: 2,
    format: 'yyyy'
});

$("#tanggal_lahir").datepicker({
    format: 'yyyy-mm-dd'
});
$("#tanggal_lahir").on("change", function () {
    var fromdate = $(this).val();
});