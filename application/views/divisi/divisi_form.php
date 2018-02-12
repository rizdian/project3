<section class="content-header">
    <h1>
        Divisi
        <small>Buat</small>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="int">Nama <?php echo form_error('nama') ?></label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" maxlength="20"
                                       value="<?php echo $page_var['nama']; ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="id" value="<?php echo $page_var['id']; ?>"/>
                                <button type="submit" id='btn' value="<?php echo $page_var['button'] ?>"
                                        class="btn btn-primary"><?php echo $page_var['button'] ?></button>
                                <a href="<?php echo site_url('divisi') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>