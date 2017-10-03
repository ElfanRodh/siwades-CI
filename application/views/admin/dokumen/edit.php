                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('home') ?>">SIWADES</a></li>
                    <li><a href="<?php echo site_url('dokumen') ?>">DOKUMEN</a></li>
                    <li class="active">EDIT</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-file"></span> Edit <?php echo $dokumen['nama_dokumen'] ?></h2>
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
                                <?php echo form_open_multipart('dokumen/edit_proses/'.$dokumen['id_dokumen']) ?>
                                <div class="form-horizontal" role="form">                                  
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nama Dokumen</label>
                                        <div class="col-md-9">
                                            <input type="text" name="nama_dokumen" class="form-control" placeholder="Masukkan Nama dokumen" value="<?php echo $dokumen['nama_dokumen'] ?>" />
                                            <?php echo form_error('nama_dokumen') ?>
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