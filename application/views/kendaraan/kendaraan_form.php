<section class="content-header">
    <h1>
        Kendaraan
        <small>Create</small>
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
                        <div class="form-group">
                            <label for="varchar">No Polisi <?php echo form_error('no_polisi') ?></label>
                            <input type="text" class="form-control" name="no_polisi" id="no_polisi"
                                   placeholder="No Polisi" value="<?php echo $page_var['no_polisi']; ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama"
                                   value="<?php echo $page_var['nama']; ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Warna <?php echo form_error('warna') ?></label>
                            <input type="text" class="form-control" name="warna" id="warna" placeholder="Warna"
                                   value="<?php echo $page_var['warna']; ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="blob">Foto <?php echo form_error('foto') ?></label>
                            <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto"
                                   value="<?php echo $page_var['foto']; ?>"/>
                        </div>
                        <!--<div class="form-group">
                            <label>Status <?php /*echo form_error('status') */?></label>
                            <select class="form-control" id="status" name="status">
                                <option value="0">Available</option>
                                <option value="1">Not-Available</option>
                            </select>
                            <input type="hidden" id="temp_status" value="<?php /*echo $page_var['status']; */?>"/>
                        </div>-->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="id" value="<?php echo $page_var['id']; ?>"/>
                                <button type="submit" id='btn' value="<?php echo $page_var['button'] ?>"
                                        class="btn btn-primary"><?php echo $page_var['button'] ?></button>
                                <a href="<?php echo site_url('kendaraan') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

