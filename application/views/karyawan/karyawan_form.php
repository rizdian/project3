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
        <h2 style="margin-top:0px">Karyawan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Nip <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">No Ktp <?php echo form_error('no_ktp') ?></label>
            <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="No Ktp" value="<?php echo $no_ktp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Depan <?php echo form_error('nama_depan') ?></label>
            <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Nama Depan" value="<?php echo $nama_depan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Tengah <?php echo form_error('nama_tengah') ?></label>
            <input type="text" class="form-control" name="nama_tengah" id="nama_tengah" placeholder="Nama Tengah" value="<?php echo $nama_tengah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Belakang <?php echo form_error('nama_belakang') ?></label>
            <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang" value="<?php echo $nama_belakang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="year">Tahun Masuk <?php echo form_error('tahun_masuk') ?></label>
            <input type="text" class="form-control" name="tahun_masuk" id="tahun_masuk" placeholder="Tahun Masuk" value="<?php echo $tahun_masuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Lama Kontrak <?php echo form_error('lama_kontrak') ?></label>
            <input type="text" class="form-control" name="lama_kontrak" id="lama_kontrak" placeholder="Lama Kontrak" value="<?php echo $lama_kontrak; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Divisi <?php echo form_error('divisi') ?></label>
            <input type="text" class="form-control" name="divisi" id="divisi" placeholder="Divisi" value="<?php echo $divisi; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('karyawan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>