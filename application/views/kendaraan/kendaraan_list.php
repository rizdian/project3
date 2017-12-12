<section class="content-header">
    <h1>
        Kendaraan
        <small>List</small>
    </h1>
</section>
<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="col-md-4">
                        <?php echo anchor(site_url('kendaraan/create'), 'Create', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('kendaraan/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q"
                                       value="<?php echo $page_var['q']; ?>">
                                <span class="input-group-btn">
                                        <?php
                                        if ($page_var['q'] <> '') {
                                            ?>
                                            <a href="<?php echo site_url('kendaraan'); ?>"
                                               class="btn btn-default">Reset</a>
                                            <?php
                                        }
                                        ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    </span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <table class="table table-striped" style="margin-bottom: 10px">
                            <tr>
                                <th>No</th>
                                <th>No Polisi</th>
                                <th>Nama</th>
                                <th>Warna</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            foreach ($page_var['kendaraan_data'] as $kendaraan) {
                                ?>
                                <tr>
                                    <td width="80px"><?php echo ++$page_var['start'] ?></td>
                                    <td><?php echo $kendaraan->no_polisi ?></td>
                                    <td><?php echo $kendaraan->nama ?></td>
                                    <td><?php echo $kendaraan->warna ?></td>
                                    <td><?php echo $kendaraan->foto ?></td>
                                    <td><?php if($kendaraan->status == 0) echo 'Available'; else echo 'Not-Available';?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php
                                        echo anchor(site_url('kendaraan/read/' . $kendaraan->id), 'Read');
                                        echo ' | ';
                                        echo anchor(site_url('kendaraan/update/' . $kendaraan->id), 'Update');
                                        echo ' | ';
                                        echo anchor(site_url('kendaraan/delete/' . $kendaraan->id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-primary">Total Record
                                    : <?php echo $page_var['total_rows'] ?></a>
                            </div>
                            <div class="col-md-6 text-right">
                                <?php echo $page_var['pagination'] ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
