<section class="content-header">
    <h1>
        Formulir
        <small>Peminjaman</small>
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
                <form role="form" action="<?php echo $page_var['action']; ?>" method="post">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="varchar">Karyawan</label>
                                <select class="form-control" name="karyawan">
                                    <?php
                                    foreach ($page_var['karyawan'] as $each => $value) { ?>
                                        <option
                                                value="<?php echo $value->id; ?>"><?php echo $value->nama_depan; ?>
                                            - <?php echo $value->nama_belakang; ?></option>';
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="varchar">Kendaraan</label>
                                <select class="form-control" name="kendaraan">
                                    <?php
                                    foreach ($page_var['kendaraan'] as $each => $value) { ?>
                                        <option
                                                value="<?php echo $value->id; ?>"><?php echo $value->no_polisi; ?>
                                            - <?php echo $value->nama; ?></option>';
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Tanggal Pinjam <?php echo form_error('tgl_pinjam') ?></label>
                                <input type="text" class="form-control" name="tgl_pinjam" id="tgl_pinjam"
                                       value="<?php echo $page_var['tgl_pinjam']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Tanggal Kembali <?php echo form_error('tgl_kembali') ?></label>
                                <input type="text" class="form-control" name="tgl_kembali" id="tgl_kembali"
                                       value="<?php echo $page_var['tgl_kembali']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" rows="3" name="keterangan" id="keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" id='btn' value="create"
                                        class="btn btn-primary"><?php echo $page_var['button'] ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>