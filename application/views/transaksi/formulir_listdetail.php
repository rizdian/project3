<section class="content-header">
    <h1>
        Peminjaman
        <small>List Detail</small>
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
                <form role="form">
                    <div class="box-body">
                        <table id="datatable" class="table table-striped" style="margin-bottom: 10px">
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
                            foreach ($page_var['detail_data'] as $detail) {
                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo ++$page_var['start'] ?></td>
                                    <td style="text-align: center"><?php if($detail->status == 1)echo "Di Setujui"; elseif($detail->status == 2)echo "Di Tolak"; else echo "-"?></td>
                                    <td><?php echo $detail->nama ?></td>
                                    <td style="text-align: center"><?php echo "Level-".$detail->flag?></td>
                                    <td style="text-align: center"><?php if(isset($detail->id_karyawan))echo $detail->nama_depan. " - " . $detail->nama_belakang; else echo "-"?></td>
                                    <td style="text-align: center"><?php echo $detail->on_update ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?php echo site_url('peminjaman/data') ?>" class="btn btn-default">Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
