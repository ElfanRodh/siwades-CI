<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>REGISTER DULU GAN</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?php echo base_url() ?>assets/favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>assets/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title">Silahkan <strong>Register</strong></div>
                    <?php 
                        if($this->session->flashdata('gagal_register') != ""){
                               echo '<div class="alert alert-danger"><strong>Error!</strong> Gagal Register</div>';
                            } 
                    ?>
                    <?php echo form_open('login/register_proses') ?>
                    <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK Anda"/>
                            <span class="help-block"> NB : NIK harus sesuai dengan NIK di Kartu Keluarga</span>
                            <?php echo form_error('nik') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control" placeholder="Username"/>
                            <?php echo form_error('username') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                            <?php echo form_error('password') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password2" class="form-control" placeholder="Verifikasi Password"/>
                            <?php echo form_error('password') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-info btn-block">REGUSTER</button>
                        </div>
                    </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2017 - Kelompok PAKDUMCES
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>