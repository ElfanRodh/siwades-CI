                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('home') ?>">SIWADES</a></li>
                    <li>KELUARGA</li>
                    <li class="active">EDIT</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-file"></span> Edit <?php echo $kk['no_kk'] ?></h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-6">

                            <!-- START DEFAULT FORM ELEMENTS -->
                            <div class="panel panel-default">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <br>
                                <?php echo form_open_multipart('kk/edit_proses/'.$kk['no_kk']) ?>
                                <div class="form-horizontal" role="form">                                  
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Alamat</label>
                                        <div class="col-md-10">
                                            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" value="<?php echo $kk['alamat'] ?>" />
                                            <?php echo form_error('alamat') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">RT</label>
                                        <div class="col-md-10">
                                            <input type="text" name="rt" class="form-control" placeholder="Masukkan RT" value="<?php echo $kk['rt'] ?>"/>
                                            <?php echo form_error('rt') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">RW</label>
                                        <div class="col-md-10">
                                            <input type="text" name="rw" class="form-control" placeholder="Masukkan RW" value="<?php echo $kk['rw'] ?>"/>
                                            <?php echo form_error('rw') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Desa</label>
                                        <div class="col-md-10">
                                            <input type="text" name="desa" class="form-control" placeholder="Masukkan Desa" value="<?php echo $kk['desa'] ?>"/>
                                            <?php echo form_error('desa') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Kecamatan</label>
                                        <div class="col-md-10">
                                            <input type="text" name="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" value="<?php echo $kk['kecamatan'] ?>"/>
                                            <?php echo form_error('kecamatan') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Kabupaten</label>
                                        <div class="col-md-10">
                                            <input type="text" name="kabupaten" class="form-control" placeholder="Masukkan Kabupaten" value="<?php echo $kk['kabupaten'] ?>"/>
                                            <?php echo form_error('kabupaten') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Kode Pos</label>
                                        <div class="col-md-10">
                                            <input type="number" name="kode_pos" class="form-control" placeholder="Masukkan Kode Pos" value="<?php echo $kk['kode_pos'] ?>"/>
                                            <?php echo form_error('kode_pos') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Provinsi</label>
                                        <div class="col-md-10">
                                            <input type="text" name="provinsi" class="form-control" placeholder="Masukkan Provinsi" value="<?php echo $kk['provinsi'] ?>"/>
                                            <?php echo form_error('provinsi') ?>
                                        </div>
                                    </div>                        
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="form-group text-center col-md-12">
                                    <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-pencil"></i> <strong>Edit</strong></button>  
                                </div>  
                            </div>
                            </div>
                            <?php echo form_close(); ?>
                            <!-- END DEFAULT FORM ELEMENTS -->

                        </div>

                    </div>
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER --> 