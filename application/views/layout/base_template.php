<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php echo $html_head; ?>
    <title>RRA | Dashboard</title>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">
    <?php echo $header; ?>
    <?php echo $sidebar; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php echo $content; ?>
    </div>
    <!-- /.content-wrapper -->

    <?php echo $footer; ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs"></ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane" id="control-sidebar-home-tab"></div>
            <div class="tab-pane" id="control-sidebar-stats-tab"></div>
            <div class="tab-pane" id="control-sidebar-settings-tab"></div>
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<?php echo $js_file; ?>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
</body>
</html>
