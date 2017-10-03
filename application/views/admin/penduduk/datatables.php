    <script type="text/javascript">
      $(document).ready(function(){
        $('#penduduk').DataTable({
          "processing":true,
          "serverSide":true,
          "lengthMenu":[[5,10,25,50,100,-1],[5,10,25,50,100,"All"]],
          "ajax":{
            url : "<?php echo site_url('penduduk/data_server') ?>",
            type : "POST"
          },

          "columnDefs":
          [
            {
              "targets":0,
              "data":"nik",
              "searchable": false,
            },
            {
              "targets":1,
              "data":"nama"
            },
            {
              "targets":2,
              "data":"jk",
              "searchable": false,
            },
            {
              "targets":3,
              "data": null,
              "searchable": false,
              "render":function(data,tipe,full,meta){
                return ''+data["tempat_lahir"]+', '+data["tanggal_lahir"]+''
              }
            },
            {
              "targets":4,
              "data": null,
              "searchable": false,
              "render":function(data,tipe,full,meta){
                return '<a href="<?php echo site_url("penduduk/detail/") ?>'+data["nik"]+'" class="btn btn-warning btn-rounded btn-sm"><span class="fa fa-search"></span></a>'
              }
            },
            {
              "targets":5,
              "data": null,
              "searchable": false,
              "render":function(data,tipe,full,meta){
                return '<a href="<?php echo site_url("penduduk/edit/") ?>'+data["nik"]+'" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>'
              }
            },
            {
              "targets":6,
              "data": null,
              "searchable": false,
              "render":function(data,tipe,full,meta){
                return '<a href="<?php echo site_url("penduduk/hapus/") ?>'+data["nik"]+'" class="btn btn-danger btn-rounded btn-sm"><span class="fa fa-times"></span></a>'
              }
            }
          ],
        });
      });
    </script>