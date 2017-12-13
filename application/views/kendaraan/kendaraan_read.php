<section class="content-header">
    <h1>
        Kendaraan
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
                                <td>No Polisi</td>
                                <td><?php echo $page_var['no_polisi']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><?php echo $page_var['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Warna</td>
                                <td><?php echo $page_var['warna']; ?></td>
                            </tr>
                            <tr>
                                <td>Foto</td>
                                <td><img src="<?php echo base_url()?>assets/images/<?php echo $page_var['foto'];?>" class="img-thumbnail" style="width:25%"></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?php echo $page_var['status']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?php echo site_url('kendaraan') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



