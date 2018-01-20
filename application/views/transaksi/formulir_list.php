<section class="content-header">
    <h1>
        Peminjaman
        <small>List</small>
    </h1>
</section>
<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
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
                                <th style="text-align: center">Tanggal Pinjam / Kembali </th>
                                <th style="text-align: center">Keterangan</th>
                                <th style="text-align: center">Status Pinjam</th>
                                <th style="text-align: center">Status Kembali</th>
                                <th style="text-align: center">No Polisi</th>
                                <th style="text-align: center">Nama Kendaraan</th>
                                <th style="text-align: center">Peminjam</th>
                                <th style="text-align: center">Penyetuju Terakhir</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($page_var['peminjaman_data'] as $peminjaman) {
                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo ++$page_var['start'] ?></td>
                                    <td style="text-align: center"><?php echo $peminjaman->tgl_pinjam ?> - <?php echo $peminjaman->tgl_kembali ?></td>
                                    <td><?php echo $peminjaman->keterangan ?></td>
                                    <td style="text-align: center"><?php if($peminjaman->flag == '0') echo "Di Tolak"; elseif($peminjaman->flag < 5) echo "Di Proses"; else echo "Di Setujui"?></td>
                                    <td style="text-align: center"><?php if($peminjaman->status_kembali == '0') echo "-"; else echo 'Di Kembalikan'; ?></td>
                                    <td style="text-align: center"><?php echo $peminjaman->no_polisi ?></td>
                                    <td style="text-align: center"><?php echo $peminjaman->nama ?></td>
                                    <td><?php echo $peminjaman->nama_depan ?> - <?php echo $peminjaman->nama_belakang ?></td>
                                    <td style="text-align: center"><?php if(isset($peminjaman->d_penyetuju)) { echo $peminjaman->d_penyetuju ;echo "-"; echo $peminjaman->b_penyetuju; }else echo "-"; ?></td>
                                    <td style="text-align:center">
                                        <?php
                                        echo anchor(site_url('peminjaman/datadetail/' . $peminjaman->id), '<i class="glyphicon glyphicon-list-alt"></i>','title="Read", class="btn btn-xs btn-primary"'); echo ' ';
                                        if ($peminjaman->flag == 5)
                                            echo anchor(site_url('peminjaman/cetak/' . $peminjaman->id), '<i class="glyphicon glyphicon-print"></i>','title="Print", class="btn btn-xs btn-default"'); echo ' ';
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
