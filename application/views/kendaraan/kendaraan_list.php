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

                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <table id="datatable" class="table table-striped" style="margin-bottom: 10px">
                            <thead>
                            <tr>
                                <th style="text-align: center">No.</th>
                                <th style="text-align: center">No Polisi</th>
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center">Warna</th>
                                <th style="text-align: center">Foto</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($page_var['kendaraan_data'] as $kendaraan) {
                                ?>
                                <tr>
                                    <td width="80px"><?php echo ++$page_var['start'] ?></td>
                                    <td><?php echo $kendaraan->no_polisi ?></td>
                                    <td><?php echo $kendaraan->nama ?></td>
                                    <td><?php echo $kendaraan->warna ?></td>
                                    <td><img src="assets/images/<?php echo $kendaraan->foto ?>" class="img-thumbnail"
                                             style="width:40%"></td>
                                    <td><?php if ($kendaraan->status == 0) echo 'Available'; else echo 'Not-Available'; ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php
                                        echo anchor(site_url('kendaraan/read/' . $kendaraan->id), '<i class="glyphicon glyphicon-list-alt"></i>','title="Read", class="btn btn-xs btn-primary"'); echo ' ';
                                        echo anchor(site_url('kendaraan/update/' . $kendaraan->id) ,'<i class="glyphicon glyphicon-pencil"></i>','title="Edit", class="btn btn-xs btn-warning"'); echo ' ';
                                        echo anchor(site_url('kendaraan/delete/' . $kendaraan->id),'<i class="glyphicon glyphicon-trash"></i>','title="Hapus", class="btn btn-xs btn-danger", onclick="javasciprt: return confirm(\'Apakah Anda yakin ?\')"');
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
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
