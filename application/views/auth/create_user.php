<section class="content-header">
    <h1>
        User
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
                <form role="form" action="create_user" method="post">
                    <div class="box-body">
                        <div id="infoMessage" class="col-md-12"><?php echo $page_var['message']; ?></div>
                        <div class="form-group">
                            <div class="col-md-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="varchar">Karyawan</label>
                                <select class="form-control" name="karyawan">
                                    <?php
                                    foreach ($page_var['karyawan'] as $each => $value) { ?>
                                        <option
                                                value="<?php echo $value->id; ?>"><?php echo $value->nama_depan; ?> - <?php echo $value->nama_belakang; ?></option>';
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <?php
                                if ($page_var['identity_column'] !== 'email') {
                                    echo '<p>';
                                    echo lang('create_user_identity_label', 'identity');
                                    echo '<br />';
                                    echo form_error('identity');
                                    echo form_input($page_var['identity']);
                                    echo '</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <?php echo lang('create_user_email_label', 'email'); ?> <br/>
                                <?php echo form_input($page_var['email']); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <?php echo lang('create_user_password_label', 'password'); ?> <br/>
                                <?php echo form_input($page_var['password']); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?> <br/>
                                <?php echo form_input($page_var['password_confirm']); ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" id='btn'
                                        class="btn btn-primary">Buat
                                </button>
                                <a href="<?php echo site_url('auth/index') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
