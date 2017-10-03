                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('home') ?>">SIWADES</a></li>
                    <li class="active">PENDUDUK</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-user"></span> PENDUDUK</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                 
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Ekspor Penduduk</h3>
                                    <div class="btn-group pull-right">
                                        <a target="_blank" href="<?php echo site_url('penduduk/cetakPDF') ?>" class="btn btn-danger"><i class="fa fa-print"></i> Cetak Data</a>
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
                                    <table id="penduduk" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <th style="width: 55px">Detail</th>
                                                <th style="width: 55px">Edit</th>
                                                <th style="width: 55px">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>                                    
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            

                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
