$("#tgl_pinjam").datepicker({
    format: 'yyyy-mm-dd',
    minDate: moment()
});
$("#tgl_pinjam").on("change", function () {
    var fromdate = $(this).val();
});
$("#tgl_kembali").datepicker({
    format: 'yyyy-mm-dd'
});
$("#tgl_kembali").on("change", function () {
    var fromdate = $(this).val();
});