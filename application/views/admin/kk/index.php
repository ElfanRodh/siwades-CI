                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('home') ?>">SIWADES</a></li>
                    <li class="active">KELUARGA</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-users"></span> Keluarga</h2>
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
                                        <a href="<?php echo site_url('kk/cetak_kk') ?>" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> Cetak Data</a>
                                    </div>
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
                                                <th style="width: 100px">No KK</th>
                                                <th>Kepala Keluarga</th>
                                                <th>Jumlah Keluarga</th>
                                                <th>Alamat</th>
                                                <th style="width: 155px">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=0; foreach ($kk as $row): $no++?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row->no_kk ?></td>
                                                <td><strong>
                                                    <?php 
                                                        $id_k = $row->kepala_keluarga;
                                                        $k = $this->db->query("SELECT * FROM penduduk
                                                                         WHERE nik = '$id_k'")->row_array();
                                                        echo $k['nama'];
                                                        if ($k['nama'] == "") {
                                                            echo "</strong><i>Kepala Keluarga Hilang</i><strong>";
                                                        }
                                                     ?>
                                                </strong></td>
                                                <td>
                                                    <?php 
                                                        $id = $row->no_kk;
                                                        $q = $this->db->query("SELECT * FROM penduduk
                                                                         WHERE no_kk = '$id'");
                                                        echo '<span class="label label-info">'.$q->num_rows().' Orang</span>';
                                                     ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                    echo $row->alamat.' '.$row->rt.'/'.$row->rw.' '.$row->desa.' '.$row->kecamatan.' '.$row->kabupaten.' ('.$row->kode_pos.') '.$row->provinsi; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo site_url('kk/detail/'.$row->no_kk) ?>" class="btn btn-warning btn-rounded btn-sm"><span class="fa fa-search"></span></a>
                                                    <a href="<?php echo site_url('kk/edit/'.$row->no_kk) ?>" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo site_url('kk/hapus/'.$row->no_kk) ?>" class="btn btn-danger btn-rounded btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Keluarga <?php echo $k['nama'] ?> ?');"><span class="fa fa-times"></span></a>
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
                        <?php echo form_open_multipart('kk/tambah_proses') ?>
                        <div class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Nomor KK</label>
                                <div class="col-md-10">
                                    <input type="number" name="no_kk" class="form-control" placeholder="Masukkan Nomor KK"/>
                                    <?php echo form_error('no_kk') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Alamat</label>
                                <div class="col-md-10">
                                    <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat"/>
                                    <?php echo form_error('alamat') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">RT</label>
                                <div class="col-md-10">
                                    <input type="text" name="rt" class="form-control" placeholder="Masukkan RT"/>
                                    <?php echo form_error('rt') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">RW</label>
                                <div class="col-md-10">
                                    <input type="text" name="rw" class="form-control" placeholder="Masukkan RW"/>
                                    <?php echo form_error('rw') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Desa</label>
                                <div class="col-md-10">
                                    <input type="text" name="desa" class="form-control" placeholder="Masukkan Desa"/>
                                    <?php echo form_error('desa') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Kecamatan</label>
                                <div class="col-md-10">
                                    <input type="text" name="kecamatan" class="form-control" placeholder="Masukkan Kecamatan"/>
                                    <?php echo form_error('kecamatan') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Kabupaten</label>
                                <div class="col-md-10">
                                    <input type="text" name="kabupaten" class="form-control" placeholder="Masukkan Kabupaten"/>
                                    <?php echo form_error('kabupaten') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Kode Pos</label>
                                <div class="col-md-10">
                                    <input type="number" name="kode_pos" class="form-control" placeholder="Masukkan Kode Pos"/>
                                    <?php echo form_error('kode_pos') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Provinsi</label>
                                <div class="col-md-10">
                                    <input type="text" name="provinsi" class="form-control" placeholder="Masukkan Provinsi"/>
                                    <?php echo form_error('provinsi') ?>
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
