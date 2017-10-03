                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('home') ?>">SIWADES</a></li>
                    <li>KELUARGA</li>
                    <li class="active">DETAIL KELUARGA <?php $kk['no_kk'] ?></li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-user"></span> DETAIL KELUARGA <?php $kk['no_kk'] ?></h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                 
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="btn-group pull-left">
                                        <a href="<?php echo site_url('kk/cetak_keluarga/'.$kk['no_kk']) ?>" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> Cetak Data</a>
                                    </div>
                                    <div class="btn-group pull-left">
                                        <button class="btn btn-info" data-toggle="modal" data-target="#modal_large"><i class="fa fa-plus"></i> Tambah Anggota Keluarga</button>
                                    </div>  
                                    <br><br>                                   
                                    <?php 
                                        if($this->session->flashdata('sukses_tambah') != ""){
                                               echo '<div class="alert alert-success"><strong>Sukses!</strong> Data Berhasil Ditambahkan</div>';
                                            } 
                                    ?>
                                    <?php 
                                        if($this->session->flashdata('sukses_edit') != ""){
                                               echo '<div class="alert alert-success"><strong>Sukses!</strong> Data Berhasil Diedit</div>';
                                            } 
                                    ?>
                                    <?php 
                                        if($this->session->flashdata('sukses_hapus') != ""){
                                               echo '<div class="alert alert-success"><strong>Sukses!</strong> Data Berhasil Dihapus</div>';
                                            } 
                                    ?>
                                    <?php 
                                        if($this->session->flashdata('sukses_jadi') != ""){
                                               echo '<div class="alert alert-success"><strong>Sukses!</strong> Data Berhasil Dijadikan Kepala Keluarga</div>';
                                            } 
                                    ?>
                                    <?php 
                                        if($this->session->flashdata('gagal_tambah_resize') != ""){
                                               echo '<div class="alert alert-danger"><strong>Error!</strong> Data Gagal Diresize</div>';
                                            } 
                                    ?>
                                    <?php 
                                        if($this->session->flashdata('gagal_tambah_upload') != ""){
                                               echo '<div class="alert alert-danger"><strong>Error!</strong> Data Gagal Diupload</div>';
                                            } 
                                    ?>
                                </div>
                                <div class="panel-body table-responsive">
                                    <table id="customers2" class="table datatable table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kepala Keluarga</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <th style="width: 155px">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($penduduk as $row): ?>
                                            <tr>
                                                <td align="center">
                                                    <?php if ($row->nik == $kk['kepala_keluarga']) {?>
                                                        <a href="#" class="btn btn-info" data-toggle="tooltip" data-original-title="" title="Kepala Keluarga"><i class="fa fa-user"></i></a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo site_url('kk/jadi/'.$kk['no_kk'].'/'.$row->nik) ?>" class="btn btn-warning btn-rounded" data-toggle="tooltip" data-original-title="" title="Jadikan Kepala Keluarga"><i class="fa fa-users"></i></a>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $row->nik ?></td>
                                                <td><strong><?php echo $row->nama ?></strong></td>
                                                <td><?php if($row->jk == 'L'){echo 'Laki-laki';}else{echo 'Perempuan';} ?></td>
                                                <td><?php echo $row->tempat_lahir.', '.$row->tanggal_lahir ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('penduduk/detail/'.$row->nik) ?>" class="btn btn-warning btn-rounded btn-sm"><span class="fa fa-search"></span></a>
                                                    <a href="<?php echo site_url('penduduk/edit_penduduk/'.$row->nik) ?>" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo site_url('penduduk/hapus/'.$row->nik) ?>" class="btn btn-danger btn-rounded btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row->nama ?> ?');"><span class="fa fa-times"></span></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>                                    
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            

                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->

        <div class="modal" id="modal_large" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="largeModalHead"><i class="fa fa-plus"></i> Tambah Data</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('penduduk/tambah_proses/'.$kk['no_kk']) ?>
                        <div class="form-horizontal" role="form">                                       
                            <div class="form-group">
                                <label class="col-md-2 control-label">NIK</label>
                                <div class="col-md-10">
                                    <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK"/>
                                    <?php echo form_error('nik'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Nama Penduduk</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Penduduk"/>
                                    <?php echo form_error('nama') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Tempat Lahir</label>
                                <div class="col-md-10">
                                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir"/>
                                    <?php echo form_error('tempat_lahir') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Tanggal Lahir</label>
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <input type="text" id="dp-3" name="tanggal_lahir" class="form-control datepicker" data-date-format="dd-mm-yyyy"/>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                <?php echo form_error('tanggal_lahir') ?>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-md-2 control-label">Jenis Kelamin</label>
                                <div class="col-md-10">                                        
                                    <select class="form-control select" name="jk">
                                        <option value="">--Pilih Jenis Kelamin--</option>
                                        <option value="L">Laki - laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <?php echo form_error('jk') ?>
                                </div>
                            </div>                             
                            <div class="form-group">
                                <label class="col-md-2 control-label">Pendidikan</label>
                                <div class="col-md-10">                                        
                                    <select class="form-control select" name="pendidikan">
                                        <option value="">--Pilih Pendidikan--</option>
                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                                        <option value="SD Sederajat">SD Sederajat</option>
                                        <option value="SMP Sederajat">SMP Sederajat</option>
                                        <option value="SMA Sederajat">SMA Sederajat</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="S1/D4">S1/D4</option>
                                        <option value="S2">S2</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <?php echo form_error('pendidikan') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Pekerjaan</label>
                                <div class="col-md-10">                                        
                                    <select class="form-control select" name="pekerjaan">
                                        <option value="">--Pilih Pekerjaan--</option>
                                        <option value="Swasta">Karyawan Swasta</option>
                                        <option value="Wiraswasta">Wira Usaha</option>
                                        <option value="Petani">Petani</option>
                                        <option value="PNS">PNS</option>
                                        <option value="Mahasiswa/Pelajar">Mahasiswa/Pelajar</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <?php echo form_error('pekerjaan') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Foto</label>
                                <div class="col-md-10">
                                    <input type="file" name="foto" class="fileinput btn-success" name="filename3" id="filename3" data-filename-placement="inside" title="Tambahkan Foto"/>
                                </div>
                            </div>            
                        </div>
                        <!-- END DEFAULT FORM ELEMENTS -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> Simpan</button>                      
                    </div>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div> 
