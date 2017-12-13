<section class="content-header">
    <h1>
        User
        <small>List</small>
    </h1>
</section>

<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="col-md-4">
                        <?php echo anchor(site_url('auth/create_user'), 'Create User', 'class="btn btn-primary"'); ?>
                        <?php /*echo anchor(site_url('auth/create_group'), 'Create Group', 'class="btn btn-primary"'); */?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div id="infoMessage"><?php echo $page_var['message']; ?></div>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th><?php echo lang('index_fname_th'); ?></th>
                                    <th><?php echo lang('index_lname_th'); ?></th>
                                    <th><?php echo lang('index_email_th'); ?></th>
                                    <th><?php echo lang('index_groups_th'); ?></th>
                                    <th><?php echo lang('index_status_th'); ?></th>
                                    <th><?php echo lang('index_action_th'); ?></th>
                                </tr>
                                <?php foreach ($page_var['users'] as $user): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <?php foreach ($user->groups as $group): ?>
                                                <?php echo $group->name?>
                                                <?php /*echo anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); */?>
                                                <br/>
                                            <?php endforeach ?>
                                        </td>
                                        <td><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, lang('index_active_link')) : anchor("auth/activate/" . $user->id, lang('index_inactive_link')); ?></td>
                                        <td><?php echo anchor("auth/edit_user/" . $user->id, 'Edit'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>