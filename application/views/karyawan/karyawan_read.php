<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Karyawan Read</h2>
        <table class="table">
	    <tr><td>Nip</td><td><?php echo $nip; ?></td></tr>
	    <tr><td>No Ktp</td><td><?php echo $no_ktp; ?></td></tr>
	    <tr><td>Nama Depan</td><td><?php echo $nama_depan; ?></td></tr>
	    <tr><td>Nama Tengah</td><td><?php echo $nama_tengah; ?></td></tr>
	    <tr><td>Nama Belakang</td><td><?php echo $nama_belakang; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Tahun Masuk</td><td><?php echo $tahun_masuk; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Lama Kontrak</td><td><?php echo $lama_kontrak; ?></td></tr>
	    <tr><td>Divisi</td><td><?php echo $divisi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('karyawan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>