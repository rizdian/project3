<section class="content-header">
    <h1>
        Deactivate
        <small>User</small>
    </h1>
</section>
<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <p><?php echo sprintf(lang('deactivate_subheading'), $page_var['user']->username); ?> ?</p>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php uri_string() ?>" method="post">
                    <div class="box-body">
                        <div class="col-md-12">
                            <p>
                                <?php echo lang('deactivate_confirm_n_label', 'confirm'); ?>
                                <input type="radio" name="confirm" value="no"/>
                                &nbsp;
                                <?php echo lang('deactivate_confirm_y_label', 'confirm'); ?>
                                <input type="radio" name="confirm" value="yes" checked="checked"/>
                            </p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo form_hidden($page_var['csrf']); ?>
                                <?php echo form_hidden(array('id' => $page_var['user']->id)); ?>
                                <button type="submit" id='btn' class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>