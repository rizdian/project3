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
                    <?php if($this->session->userdata('message')) { ?>
                    <div id="message" class="alert alert-info alert-dismissible show">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php } ?>
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
                            <label for="date">Tanggal Pinjam <?php echo form_error('tgl_pinjam') ?> - Tanggal
                                Kembali <?php echo form_error('tgl_kembali') ?></label>
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="input-sm form-control" name="tgl_pinjam" id="tgl_pinjam"
                                       value="<?php echo $page_var['tgl_pinjam']; ?>" readonly/>
                                <span class="input-group-addon">sampai</span>
                                <input type="text" class="input-sm form-control" name="tgl_kembali"
                                       value="<?php echo $page_var['tgl_kembali']; ?>" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                <input type="hidden" name="flag" value="<?php echo $page_header->flag; ?>"/>
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