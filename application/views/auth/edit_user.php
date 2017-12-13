<section class="content-header">
    <h1>
        User
        <small>Update</small>
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
                <form role="form" action="<?php uri_string() ?>" method="post">
                    <div class="box-body">
                        <div id="infoMessage" class="col-md-12"><?php echo $page_var['message']; ?></div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="varchar">Username</label>
                                    <input type="text" class="form-control"
                                           value="<?php echo $page_var['user']->username; ?>" disabled/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <?php echo lang('edit_user_password_label', 'password'); ?> <br/>
                                <?php echo form_input($page_var['password']); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <?php echo lang('edit_user_password_confirm_label', 'password_confirm'); ?><br/>
                                <?php echo form_input($page_var['password_confirm']); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <?php if ($this->ion_auth->is_admin()): ?>
                                    <h5><?php echo lang('edit_user_groups_heading'); ?></h5>
                                    <div class="checkbox icheck">
                                        <?php foreach ($page_var['groups'] as $group): ?>
                                            <label class="checkbox">
                                                <?php
                                                $gID = $group['id'];
                                                $checked = null;
                                                $item = null;
                                                foreach ($page_var['currentGroups'] as $grp) {
                                                    if ($gID == $grp->id) {
                                                        $checked = ' checked="checked"';
                                                        break;
                                                    }
                                                }
                                                ?>
                                                <input type="checkbox" name="groups[]"
                                                       value="<?php echo $group['id']; ?>"<?php echo $checked; ?>>
                                                <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                            </label> &nbsp;
                                        <?php endforeach ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo form_hidden('id', $page_var['user']->id); ?>
                                <?php echo form_hidden($page_var['csrf']); ?>
                                <button type="submit" id='btn' class="btn btn-primary">Update</button>
                                <a href="<?php echo site_url('auth/index') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>