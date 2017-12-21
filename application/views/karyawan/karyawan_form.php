<section class="content-header">
    <h1>
        Karyawan
        <small>Create</small>
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
                                <label for="int">Nip <?php echo form_error('nip') ?></label>
                                <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip"
                                       value="<?php echo $page_var['nip']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="int">No Ktp <?php echo form_error('no_ktp') ?></label>
                                <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="No Ktp"
                                       value="<?php echo $page_var['no_ktp']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="varchar">Nama Depan <?php echo form_error('nama_depan') ?></label>
                                <input type="text" class="form-control" name="nama_depan" id="nama_depan"
                                       placeholder="Nama Depan" value="<?php echo $page_var['nama_depan']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="varchar">Nama Tengah <?php echo form_error('nama_tengah') ?></label>
                                <input type="text" class="form-control" name="nama_tengah" id="nama_tengah"
                                       placeholder="Nama Tengah" value="<?php echo $page_var['nama_tengah']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="varchar">Nama Belakang <?php echo form_error('nama_belakang') ?></label>
                                <input type="text" class="form-control" name="nama_belakang" id="nama_belakang"
                                       placeholder="Nama Belakang" value="<?php echo $page_var['nama_belakang']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                       placeholder="Tempat Lahir" value="<?php echo $page_var['tempat_lahir']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
                                <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                       placeholder="Tanggal Lahir" value="<?php echo $page_var['tanggal_lahir']; ?>" readonly/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                                <textarea class="form-control" rows="3" name="alamat" id="alamat"
                                          placeholder="Alamat"><?php echo $page_var['alamat']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="year">Tahun Masuk <?php echo form_error('tahun_masuk') ?></label>
                                <input type="text" class="form-control" name="tahun_masuk" id="tahun_masuk"
                                       placeholder="Tahun Masuk" value="<?php echo $page_var['tahun_masuk']; ?>" readonly/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- select -->
                            <div class="form-group">
                                <label>Status <?php echo form_error('status') ?></label>
                                <select class="form-control" id="status" name="status">
                                    <option value="tetap">Tetap</option>
                                    <option value="kontrak">Kontrak</option>
                                </select>
                                <input type="hidden" id="temp_status" value="<?php echo $page_var['status']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="int">Lama Kontrak <?php echo form_error('lama_kontrak') ?></label>
                                <input type="text" class="form-control" name="lama_kontrak" id="lama_kontrak"
                                       placeholder="Lama Kontrak" value="<?php echo $page_var['lama_kontrak']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="varchar">Divisi <?php echo form_error('divisi') ?></label>
                                <select class="form-control" id="divisi" name="divisi">
                                    <option value="head">Head</option>
                                    <option value="officer">Officer</option>
                                </select>
                                <input type="hidden" id="temp_divisi" value="<?php echo $page_var['divisi']; ?>"/>
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
                                <a href="<?php echo site_url('karyawan') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>