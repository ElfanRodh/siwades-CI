<?php $this->load->view('header'); ?>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <?php $this->load->view('menu'); ?>
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                                     
                <?php $this->load->view('atas'); ?>                     
                
                <?php include ($konten); ?>
                                              
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
<?php $this->load->view('footer'); ?>