                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('home') ?>">SIWADES</a></li>
                    <li class="active">DOKUMEN</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-file"></span> DOKUMEN</h2>
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
                                        <button class="btn btn-info" data-toggle="modal" data-target="#modal_large"><i class="fa fa-plus"></i> Tambah Data</button>
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
                                </div>
                                <div class="panel-body table-responsive">
                                    <table id="customers2" class="table datatable table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Dokumen</th>
                                                <th>Jumlah Dokumen</th>
                                                <th style="width: 130px">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=0; foreach ($dokumen as $row): $no++?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><strong><?php echo $row->nama_dokumen ?></strong></td>
                                                <td>
                                                    <?php 
                                                        $id = $row->id_dokumen;
                                                        $q = $this->db->query("SELECT * FROM dokumen_penduduk
                                                                         WHERE dokumen_penduduk.id_dokumen = '$id'");
                                                        echo $q->num_rows();
                                                     ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo site_url('dokumen/edit/'.$row->id_dokumen) ?>" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo site_url('dokumen/hapus/'.$row->id_dokumen) ?>" class="btn btn-danger btn-rounded btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row->nama_dokumen ?> ?');"><span class="fa fa-times"></span></a>
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
                        <?php echo form_open_multipart('dokumen/tambah_proses') ?>
                        <div class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Nama dokumen</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama_dokumen" class="form-control" placeholder="Masukkan Nama dokumen"/>
                                    <?php echo form_error('nama_dokumen') ?>
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
