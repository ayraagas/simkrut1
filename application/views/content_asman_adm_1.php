<section class="content">
<div class="row">
 <div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Calon Asisten Mandiri <?php echo "$tahunajaran->tahun "; echo "$tahunajaran->semester"; ?></h3>
    </div>
    <div class="box-body">
    <button type="button" class="btn btn-success"><a href="dataasman/simpanExcel_submit" style="text-decoration: none;color: white;">Ekspor CSV</a></button><br> <br>
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Matakuliah</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Nilai</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($asisten_mandiri as $asman) { ?>
            <tr>
              <td><?php echo $asman->nama; ?></td>
              <td><?php echo $asman->nim; ?></td>
              <td><?php echo $asman->nama_mhs; ?></td>
              <td><?php echo $asman->no_telp; ?></td>
              <td><?php echo $asman->nilai; ?></td>
            </tr>
            <?php } ?>
          </div>
        </tbody>
        <tfoot>
          <tr>
            <th>Matakuliah</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Nilai</th>
            <!--   <th>Aksi</th> -->
          </tr>
        </tfoot>
      </table>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Dosen & Kelas</h4>
          </div>
          <div class="modal-body">
           <form class="form-horizontal" method="POST" action="<?php echo 'dataasman/terima' ?>">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm control-label">Dosen</label>
                <?php $id= $this->input->get('id');?>
                <input type="hidden" class="id_asisten" name="id_asisten" value="<?php $id ?>">
                <select name="dosen" class="form-control">
                  <?php foreach ($dosen as $dsn) {?>
                   <option value="<?php echo $dsn->id ?>"><?php echo "$dsn->nama"; ?></option>
                   <?php } ?>
                 </select>
                 <label class="col-sm control-label">Kelas</label>
                 <select name="kelas" class="form-control">
                  <option value=""></option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                  <option value="F">F</option>
                </select><br>
                <button type="submit" class="btn btn-info">Tambah</button>
              </form>

            </div></div>

          </div>

        </section>

        <!-- /.content -->
      </div>