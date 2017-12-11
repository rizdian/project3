<section class="content-header">
    <h1>
        Karyawan
        <small>Read</small>
    </h1>
</section>
<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <td>Nip</td>
                                <td><?php echo $page_var['nip']; ?></td>
                            </tr>
                            <tr>
                                <td>No Ktp</td>
                                <td><?php echo $page_var['no_ktp']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Depan</td>
                                <td><?php echo $page_var['nama_depan']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Tengah</td>
                                <td><?php echo $page_var['nama_tengah']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Belakang</td>
                                <td><?php echo $page_var['nama_belakang']; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td><?php echo $page_var['tempat_lahir']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td><?php echo $page_var['tanggal_lahir']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?php echo $page_var['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Masuk</td>
                                <td><?php echo $page_var['tahun_masuk']; ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?php echo $page_var['status']; ?></td>
                            </tr>
                            <tr>
                                <td>Lama Kontrak</td>
                                <td><?php echo $page_var['lama_kontrak']; ?></td>
                            </tr>
                            <tr>
                                <td>Divisi</td>
                                <td><?php echo $page_var['divisi']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?php echo site_url('karyawan') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


