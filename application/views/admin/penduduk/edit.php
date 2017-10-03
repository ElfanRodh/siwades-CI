                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('home') ?>">SIWADES</a></li>
                    <li>PENDUDUK</li>
                    <li class="active">EDIT</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-user"></span> Edit <?php echo $penduduk['nama'] ?></h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-6">

                            <!-- START DEFAULT FORM ELEMENTS -->
                            <div class="block">
                            <br>
                                <?php 
                                    if($this->session->userdata('gagal_tambah_resize') != ""){
                                           echo '<div class="alert alert-danger"><strong>Error!</strong> Foto Gagal Diresize</div>';
                                        } 
                                ?>
                                <?php 
                                    if($this->session->userdata('gagal_tambah_upload') != ""){
                                           echo '<div class="alert alert-danger"><strong>Error!</strong> Foto Gagal Diupload</div>';
                                        } 
                                ?>
                                <?php echo form_open_multipart('penduduk/edit_proses/'.$penduduk['nik']) ?>
                                <div class="form-horizontal" role="form">                                  
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nama Penduduk</label>
                                        <div class="col-md-10">
                                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Penduduk" value="<?php echo $penduduk['nama'] ?>" />
                                            <?php echo form_error('nama') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tempat Lahir</label>
                                        <div class="col-md-10">
                                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="<?php echo $penduduk['tempat_lahir'] ?>"/>
                                            <?php echo form_error('tempat_lahir') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tanggal Lahir</label>
                                        <?php echo form_error('tanggal_lahir') ?>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="text" id="dp-3" name="tanggal_lahir" class="form-control datepicker" data-date-format="dd-mm-yyyy" data-date-viewmode="years" value="<?php echo $penduduk['tanggal_lahir'] ?>"/>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jenis Kelamin</label>
                                        <div class="col-md-10">                                        
                                            <select class="form-control select" name="jk">
                                                <option value="">--Pilih Jenis Kelamin--</option>
                                                <option <?php if($penduduk['jk'] == 'L'){echo 'selected';} ?> value="L">Laki - laki</option>
                                                <option <?php if($penduduk['jk'] == 'P'){echo 'selected';} ?> value="P">Perempuan</option>
                                            </select>
                                            <?php echo form_error('jk') ?>
                                        </div>
                                    </div>                             
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Pendidikan</label>
                                        <div class="col-md-10">                                        
                                            <select class="form-control select" name="pendidikan">
                                                <option value="">--Pilih Pendidikan--</option>
                                                <option <?php if($penduduk['pendidikan'] == 'Tidak Sekolah'){echo 'selected';} ?> value="Tidak Sekolah">Tidak Sekolah</option>
                                                <option <?php if($penduduk['pendidikan'] == 'SD Sederajat'){echo 'selected';} ?> value="SD Sederajat">SD Sederajat</option>
                                                <option <?php if($penduduk['pendidikan'] == 'SMP Sederajat'){echo 'selected';} ?> value="SMP Sederajat">SMP Sederajat</option>
                                                <option <?php if($penduduk['pendidikan'] == 'SMA Sederajat'){echo 'selected';} ?> value="SMA Sederajat">SMA Sederajat</option>
                                                <option <?php if($penduduk['pendidikan'] == 'D1'){echo 'selected';} ?> value="D1">D1</option>
                                                <option <?php if($penduduk['pendidikan'] == 'D2'){echo 'selected';} ?> value="D2">D2</option>
                                                <option <?php if($penduduk['pendidikan'] == 'D3'){echo 'selected';} ?> value="D3">D3</option>
                                                <option <?php if($penduduk['pendidikan'] == 'S1/D4'){echo 'selected';} ?> value="S1/D4">S1/D4</option>
                                                <option <?php if($penduduk['pendidikan'] == 'S2'){echo 'selected';} ?> value="S2">S2</option>
                                                <option <?php if($penduduk['pendidikan'] == 'Lainnya'){echo 'selected';} ?> value="Lainnya">Lainnya</option>
                                            </select>
                                            <?php echo form_error('pendidikan') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Pekerjaan</label>
                                        <div class="col-md-10">                                        
                                            <select class="form-control select" name="pekerjaan">
                                                <option value="">--Pilih Pekerjaan--</option>
                                                <option <?php if($penduduk['pekerjaan'] == 'Karyawan Swasta'){echo 'selected';} ?> value="Swasta">Karyawan Swasta</option>
                                                <option <?php if($penduduk['pekerjaan'] == 'Wirausaha'){echo 'selected';} ?> value="Wirausaha">Wirausaha</option>
                                                <option <?php if($penduduk['pekerjaan'] == 'Petani'){echo 'selected';} ?> value="Petani">Petani</option>
                                                <option <?php if($penduduk['pekerjaan'] == 'PNS'){echo 'selected';} ?> value="PNS">PNS</option>
                                                <option <?php if($penduduk['pekerjaan'] == 'Mahasiswa/Pelajar'){echo 'selected';} ?> value="Mahasiswa/Pelajar">Mahasiswa/Pelajar</option>
                                                <option <?php if($penduduk['pekerjaan'] == 'Lainnya'){echo 'selected';} ?> value="Lainnya">Lainnya</option>
                                            </select>
                                            <?php echo form_error('pekerjaan') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Foto</label>
                                        <div class="col-md-10">
                                            <?php if($penduduk['foto'] == "") {?>
                                            <i><strong>Foto Belum Diupload</strong></i>
                                            <?php }else{ ?>
                                            <img src="<?php echo base_url('assets/images/penduduk/'.$penduduk['foto']) ?>">
                                            <?php } ?>
                                            <br><br>
                                            <input type="hidden" name="foto_lama" value="<?php echo $penduduk['foto'] ?>">
                                            <input type="file" name="foto_baru" class="fileinput btn-primary" name="filename3" id="filename3" data-filename-placement="inside" title="Edit Foto"/>
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-pencil"></i> <strong>Edit</strong></button>  
                                    </div>                                   
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                            <!-- END DEFAULT FORM ELEMENTS -->

                        </div>

                    </div>
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER --> 