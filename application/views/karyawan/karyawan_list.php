<section class="content-header">
    <h1>
        Karyawan
        <small>List</small>
    </h1>
</section>
<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="col-md-4">
                        <?php echo anchor(site_url('karyawan/create'), 'Create', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <table id="datatable" class="table table-striped" style="margin-bottom: 10px">
                            <thead>
                            <tr>
                                <th style="text-align: center">No.</th>
                                <th style="text-align: center">Nip</th>
                                <th style="text-align: center">No Ktp</th>
                                <th style="text-align: center">Nama Depan</th>
                                <th style="text-align: center">Nama Tengah</th>
                                <th style="text-align: center">Nama Belakang</th>
                                <th style="text-align: center">Tempat Lahir</th>
                                <th style="text-align: center">Tanggal Lahir</th>
                                <th style="text-align: center">Alamat</th>
                                <th style="text-align: center">Tahun Masuk</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Lama Kontrak</th>
                                <th style="text-align: center">Divisi</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($page_var['karyawan_data'] as $karyawan) { ?>
                                <tr>
                                    <td width="80px"><?php echo ++$page_var['start'] ?></td>
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
                                        echo anchor(site_url('karyawan/read/' . $karyawan->id), '<i class="glyphicon glyphicon-list-alt"></i>','title="Read", class="btn btn-xs btn-primary"'); echo ' ';
                                        echo anchor(site_url('karyawan/update/' . $karyawan->id) ,'<i class="glyphicon glyphicon-pencil"></i>','title="Edit", class="btn btn-xs btn-warning"'); echo ' ';
                                        echo anchor(site_url('karyawan/delete/' . $karyawan->id),'<i class="glyphicon glyphicon-trash"></i>','title="Hapus", class="btn btn-xs btn-danger", onclick="javasciprt: return confirm(\'Apakah Anda yakin ?\')"');
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


