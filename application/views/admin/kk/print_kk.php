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
  </head>
  <body>
    <img src="<?php echo base_url('assets/kop1.jpg')?>" align="center" width="100%">


    <p style="text-align: center"> <strong>Tabel Keluarga</strong></p>
    <br><br>
    <table style="width: 100%; border: 1; border-collapse: collapse;">
      <tr>
        <th style="width: 20px;">No</th>
        <th>No. KK</th>
        <th style="width: 160px;">Kepala Keluarga</th>
        <th>Jumlah Keluarga</th>
        <th>Alamat</th>
      </tr>
      <?php $no = 0; foreach ($kk as $row): $no++; ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row->no_kk; ?></td>
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
      </tr>
    <?php endforeach; ?>
    </table>
  </body>
</html>
