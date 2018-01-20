<section class="content-header">
    <h1>
        Dashboard
        <small></small>
    </h1>
</section>
<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $page_var['t_persetujuan']; ?></h3>
                        <p>Butuh Persetujuan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a href="<?php echo site_url('peminjaman/verifikasi') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $page_var['t_kendaraan']; ?></h3>

                        <p>Mobil Tersedia</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-model-s"></i>
                    </div>
                    <a href="<?php echo site_url('kendaraan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $page_var['t_kry']; ?></h3>

                        <p>Jumlah Karyawan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php echo site_url('karyawan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $page_var['t_peminjaman']; ?></h3>

                        <p>Total Peminjaman</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?php echo site_url('peminjaman/data') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

    </div>
</section>



