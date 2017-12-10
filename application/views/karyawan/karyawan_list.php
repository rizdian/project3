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
        <h2 style="margin-top:0px">Karyawan List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('karyawan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('karyawan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('karyawan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nip</th>
		<th>No Ktp</th>
		<th>Nama Depan</th>
		<th>Nama Tengah</th>
		<th>Nama Belakang</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Alamat</th>
		<th>Tahun Masuk</th>
		<th>Status</th>
		<th>Lama Kontrak</th>
		<th>Divisi</th>
		<th>Action</th>
            </tr><?php
            foreach ($karyawan_data as $karyawan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $karyawan->nip ?></td>
			<td><?php echo $karyawan->no_ktp ?></td>
			<td><?php echo $karyawan->nama_depan ?></td>
			<td><?php echo $karyawan->nama_tengah ?></td>
			<td><?php echo $karyawan->nama_belakang ?></td>
			<td><?php echo $karyawan->tempat_lahir ?></td>
			<td><?php echo $karyawan->tanggal_lahir ?></td>
			<td><?php echo $karyawan->alamat ?></td>
			<td><?php echo $karyawan->tahun_masuk ?></td>
			<td><?php echo $karyawan->status ?></td>
			<td><?php echo $karyawan->lama_kontrak ?></td>
			<td><?php echo $karyawan->divisi ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('karyawan/read/'.$karyawan->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('karyawan/update/'.$karyawan->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('karyawan/delete/'.$karyawan->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>