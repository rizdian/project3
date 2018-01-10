<section class="content-header">
    <h1>
        Peminjaman
        <small>Cetak</small>
    </h1>
</section>
<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
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
                <form role="form" class="form-horizontal">
                    <div class="box-body">
                        <div class="col-md-12">
                            <h3 style="text-align: center">Bukti Formulir Peminjaman Kendaraan</h3>
                            <h4 style="text-align: center">DISETUJUI</h4>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px;">
                            <div class="form-group col-md-6 col-sm-6">
                                <label class="control-label col-md-3">Id:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $page_var['master']->id ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-6  col-sm-6">
                                <label class="control-label col-md-3">Karyawan:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $page_var['master']->nama_depan ." ". $page_var['master']->nama_belakang ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-6  col-sm-6">
                                <label class="control-label col-md-3">No Plat:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $page_var['master']->no_polisi ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-6  col-sm-6">
                                <label class="control-label col-md-3">Mobil:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $page_var['master']->nama ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-6  col-sm-6">
                                <label class="control-label col-md-3">Tgl Pinjam:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $page_var['master']->tgl_pinjam ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-6  col-sm-6">
                                <label class="control-label col-md-3">Tgl Kembali:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $page_var['master']->tgl_kembali ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="control-label col-md-2">Keterangan:</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="3" disabled><?php echo $page_var['master']->keterangan ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-striped" style="margin-bottom: 10px">
                                <thead>
                                <tr>
                                    <th style="text-align: center">No.</th>
                                    <th style="text-align: center">Status</th>
                                    <th style="text-align: center">Divisi</th>
                                    <th style="text-align: center">Tingkatan</th>
                                    <th style="text-align: center">Aprroval</th>
                                    <th style="text-align: center">On Update</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($page_var['detail'] as $detail) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?php echo ++$page_var['start'] ?></td>
                                        <td style="text-align: center"><?php if ($detail->status == 1) echo "Di Setujui"; elseif ($detail->status == 2) echo "Di Tolak";
                                            else echo "-" ?></td>
                                        <td><?php echo $detail->nama ?></td>
                                        <td style="text-align: center"><?php echo "Level-" . $detail->flag ?></td>
                                        <td style="text-align: center"><?php if (isset($detail->id_karyawan)) echo $detail->nama_depan . " - " . $detail->nama_belakang; else echo "-" ?></td>
                                        <td style="text-align: center"><?php echo $detail->on_update ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary" id="cetak">Cetak</button>
                                <a href="<?php echo site_url('peminjaman/data') ?>" class="btn btn-default hidden-print">Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
