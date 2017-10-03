<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul; ?></title>
    <style type="text/css">
      table{
        border-collapse: collapse;
        width: 100%;
        margin: 0 auto;
      }
      table th{
        border: 1px solid #000;
        padding: 3px;
        font-weight: bold;
        text-align: center;
      }
      table td{
        border: 1px solid #000;
        padding: 3px;
        vertical-align: top;
      }
    </style>
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>assets/css/theme-default.css"/>
  </head>
  <body>
    <img src="<?php echo base_url('assets/kop1.jpg')?>" align="center" width="100%">


    <p style="text-align: center"> <strong>Tabel Penduduk</strong></p>
    <br><br>
    <table style="width: 100%; border: 1; border-collapse: collapse;">
      <tr>
        <th>No</th>
        <th>NIK</th>
        <th><strong>Nama</strong></th>
        <th>Jenis Kelamin</th>
        <th>Tempat, Tanggal Lahir</th>
        <th>Foto</th>
      </tr>
      <?php $no = 0; foreach ($penduduk as $row): $no++; ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row->nik; ?></td>
        <td><?php echo $row->nama; ?></td>
        <td><?php if($row->jk == 'L'){echo "Laki-laki";}else{echo "Perempuan";} ?></td>
        <td><?php echo $row->tempat_lahir.', '.$row->tanggal_lahir; ?></td>
        <td>
          <div class="text-center">
            <?php if($row->foto == ""){ ?>
              <strong><i>Foto Belum Diupload</i></strong>
            <?php } else { ?>
              <img src="<?php echo base_url('assets/images/penduduk/'.$row->foto) ?>" style="width: 150px;">
            <?php } ?>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
    </table>
  </body>
</html>
