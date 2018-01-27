<section class="content-header">
    <h1>
        Divisi
        <small>List</small>
    </h1>
</section>
<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="col-md-4">
                        <?php echo anchor(site_url('divisi/create'), 'Buat', 'class="btn btn-primary"'); ?>
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
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($page_var['divisi_data'] as $divisi) { ?>
                                <tr>
                                    <td style="text-align: center"><?php echo ++$page_var['start'] ?></td>
                                    <td style="text-align:center"><?php echo $divisi->nama ?></td>
                                    <td style="text-align:center">
                                        <?php
                                        echo anchor(site_url('divisi/read/' . $divisi->id), '<i class="glyphicon glyphicon-list-alt"></i>','title="Read", class="btn btn-xs btn-primary"'); echo ' ';
                                        echo anchor(site_url('divisi/update/' . $divisi->id) ,'<i class="glyphicon glyphicon-pencil"></i>','title="Edit", class="btn btn-xs btn-warning"'); echo ' ';
                                        echo anchor(site_url('divisi/delete/' . $divisi->id),'<i class="glyphicon glyphicon-trash"></i>','title="Hapus", class="btn btn-xs btn-danger", onclick="javasciprt: return confirm(\'Apakah Anda yakin ?\')"');
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


