                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('home') ?>">SIWADES</a></li>
                    <li>PENDUDUK</li>
                    <li class="active">DETAIL <?php echo $penduduk['nama'] ?></li>
                </ul>
                <!-- END BREADCRUMB -->  

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-user"></span> DETAIL <?php echo $penduduk['nama'] ?></h2>
                </div>
                <!-- END PAGE TITLE -->                                                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="panel panel-info">
                                <div class="panel-body profile" style="background: url('<?php echo base_url()?>assets/assets/images/gallery/space-1.jpg') center no-repeat; background-size: 2000px; ">
                                    <div class="profile-image">
                                        <img src="<?php echo base_url('assets/images/penduduk/'.$penduduk['foto'])?>" alt="foto" style="height: 250px; width: 250px;"/>
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name"><strong><?php echo $penduduk['nama'] ?></strong></div>
                                        <div class="profile-data-title" style="color: #FFF;"><?php echo $penduduk['pekerjaan'] ?></div>
                                    </div>                                   
                                </div>
                                <div class="panel-body list-group border-bottom">
                                    <a href="#" class="list-group-item"><span class="fa fa-calendar"></span> 
                                    <?php echo $penduduk['tempat_lahir'].', '.$penduduk['tanggal_lahir'] ?></a>          
                                    <a href="#" class="list-group-item"><span class="fa fa-users"></span> <?php echo $penduduk['pekerjaan'] ?> </a>
                                </div>
                            </div> 
                            <div class="panel panel-info">
                                <div class="panel-heading"><i class="fa fa-file"></i> Dokumen</div>
                                <?php 
                                    if($this->session->flashdata('gagal_tambah_dokumen') != ""){
                                           echo '<div class="alert alert-danger"><strong>Error!</strong> Dokumen Gagal Diupload</div>';
                                        } 
                                ?>
                                <?php 
                                    if($this->session->flashdata('sukses_dokumen') != ""){
                                           echo '<div class="alert alert-success"><strong>Sukses!</strong> Dokumen Berhasil Diupload</div>';
                                        } 
                                ?>
                                <?php 
                                    if($this->session->flashdata('sukses_hapus_dokumen') != ""){
                                           echo '<div class="alert alert-success"><strong>Sukses!</strong> Dokumen Berhasil Dihapus</div>';
                                        } 
                                ?>
                                <div class="panel-body">
                                    <table id="customers2" class="table datatable table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Dokumen</th>
                                                <th>Status</th>
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
                                                    $nik = $penduduk['nik'];
                                                    $id_d = $row->id_dokumen;
                                                    $q = $this->db->query("SELECT * FROM dokumen_penduduk
                                                                            WHERE dokumen_penduduk.nik = '$nik'
                                                                            AND dokumen_penduduk.id_dokumen = '$id_d'");
                                                    $d = $q->row_array();
                                                
                                                    if ($q->num_rows() > 0) {
                                                 ?> 
                                                    <strong><i>Dokumen Sudah Diupload</i></strong>
                                                 <?php } else { ?>
                                                    <strong><i>Dokumen Belum Diupload</i></strong>
                                                    <br>
                                                    <?php echo form_open_multipart('penduduk/tambah_dokumen/'.$row->id_dokumen) ?>
                                                    <div class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            <div class="col-md-10">
                                                                <input type="hidden" name="nik" value="<?php echo $penduduk['nik'] ?>">
                                                                <input type="file" name="dokumen" class="fileinput btn-success" id="filename3" data-filename-placement="inside" title="Tambahkan <?php echo $row->nama_dokumen ?>"/>
                                                            </div>
                                                        </div>
                                                 <?php } ?>
                                                </td>
                                                <td>
                                                <?php if($q->num_rows() > 0) {?>
                                                    <button onclick='open("<?php echo site_url('penduduk/embed/'.$d["file"]);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355");' class="btn btn-warning btn-rounded btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cetak <?php echo $row->nama_dokumen ?>"><i class="fa fa-print"></i></button>
                                                    <a href="<?php echo site_url('penduduk/hapus_dokumen/'.$row->id_dokumen.'/'.$penduduk['nik']) ?>" title="Hapus <?php echo $row->nama_dokumen ?>" class="btn btn-danger btn-rounded btn-sm" data-toggle="tooltip" data-original-title="Hapus Data" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row->nama_dokumen ?> ?');"><span class="fa fa-times"></span></a>
                                                </td>
                                                <?php } else {?>
                                                    <button type="submit" title="Tambahkan <?php echo $row->nama_dokumen ?>" class="btn btn-info btn-rounded btn-sm"><span class="fa fa-plus"></span> Tambah</button>
                                                    </div>
                                                    <?php echo form_close(); ?>
                                                <?php } ?>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>                           
                            
                        </div>
                        
                    </div>

                </div>
                <!-- END PAGE CONTENT WRAPPER --> 