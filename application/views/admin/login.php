<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>LOGIN DULU GAN</title>            
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
                    <div class="login-title">Silahkan <strong>Log In</strong></div>
                    <?php 
                        if($this->session->flashdata('gagal_login') != ""){
                               echo '<div class="alert alert-success"><strong>Error!</strong> Username dan Password tidak cocok</div>';
                            } 
                    ?>
                    <?php 
                        if($this->session->flashdata('sukses_register') != ""){
                               echo '<div class="alert alert-success"><strong>Sukses!</strong> Berhasil Register, Silahkan Login</div>';
                            } 
                    ?>
                    <form action="<?php echo site_url('login/login') ?>" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control" placeholder="Username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                    <div class="login-subtitle">
                        Belum punya akun? <a href="<?php echo site_url('login/register') ?>">Buat Akun</a>
                    </div>
                    </form>
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