$(document).ready(function () {
   // /alert(new Date());
})

$("#tgl_pinjam").datepicker({
    format: 'yyyy-mm-dd',
    minDate: new Date('2017-12-13')
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