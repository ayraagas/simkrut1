<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1' width="70%">
  <tr>
    <th>Matakuliah</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>No Telp</th>
    <th>Nilai</th>
  </tr>
   <?php foreach ($data_asman as $asman) { ?>
            <tr>
              <td><?php echo $asman->nama; ?></td>
              <td><?php echo $asman->nim; ?></td>
              <td><?php echo $asman->nama_mhs; ?></td>
              <td>'<?php echo $asman->no_telp; ?>'</td>
              <td><?php echo $asman->nilai; ?></td>
            </tr>
            <?php } ?>
  </table>