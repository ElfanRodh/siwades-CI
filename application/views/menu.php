<!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="">SIWADES</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <?php 
                        $nik = $this->session->userdata('nik');
                        $akses = $this->session->userdata('akses');
                        $no_kk =  $this->session->userdata('no_kk');

                        if ($akses == 'admin') {
                            $f = $this->db->query("SELECT * FROM admin WHERE id_admin = '$nik'")->row_array();
                            $a      = '';
                            $b      = '';
                            $url    = 'kk';
                        } else {
                            $f = $this->db->query("SELECT * FROM penduduk WHERE nik = '$nik'")->row_array();
                            $a      = '<!--';
                            $b      = '-->';
                            $url    = 'kk/detail/'.$no_kk;
                        }
                     ?>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="<?php echo base_url('assets/images/penduduk/'.$f['foto']) ?>"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?php echo base_url('assets/images/penduduk/'.$f['foto']) ?>"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">
                                    <a href="<?php echo site_url('penduduk/detail/'.$nik) ?>">
                                        <?php echo $this->session->userdata('nama'); ?> 
                                    </a>
                                </div>
                                <div class="profile-data-title"><?php echo $this->session->userdata('pekerjaan'); ?></div>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="<?php if($aktif == 'home'){echo 'active';} ?>">
                        <a href="<?php echo site_url('home') ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li>                    
                    <li class="xn-openable <?php if($aktif == 'menu'){echo 'active';} ?>">
                        <a href="#"><span class="fa fa-bars"></span> <span class="xn-text">Menu Utama</span></a>
                        <ul>
                            <?php echo $a ?>
                            <li class="<?php if($aktif2 == 'dokumen'){echo 'active';} ?>">
                                <a href="<?php echo site_url('dokumen') ?>"><span class="fa fa-file-text-o"></span> Dokumen</a>
                            </li>
                            <?php echo $b ?>
                            <li class="<?php if($aktif2 == 'kk'){echo 'active';} ?>">
                                <a href="<?php echo site_url($url) ?>"><span class="fa fa-users"></span> Keluarga</a>
                            </li>
                            <?php echo $a ?>
                            <li class="<?php if($aktif2 == 'penduduk'){echo 'active';} ?>">
                                <a href="<?php echo site_url('penduduk') ?>"><span class="fa fa-user"></span> Penduduk</a>
                            </li>
                            <?php echo $b ?>
                        </ul>
                    </li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->