<section class="content">
<div class="row">
 <div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Calon Asisten Mandiri <?php echo "$tahunajaran->tahun "; echo "$tahunajaran->semester"; ?></h3>
    </div>
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Matakuliah</th>
            <th>Nama Mahasiswa</th>
            <th>Nilai</th>
            <th>IPK</th>
            <th>Nama Dosen</th>
            <th>Kelas</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($asisten_mandiri as $asman) { ?>
            <tr>
              <td><?php echo $asman->matakuliah; ?></td>
              <td><?php echo $asman->namamahasiswa; ?></td>
              <td><?php echo $asman->nilai; ?></td>
              <td><?php echo $asman->ipk; ?></td>
              <td><?php echo $asman->namadosen; ?></td>
              <td><?php echo $asman->kelas; ?></td>
              <td>        
                <button class='btn btn-info' id="terima" data-id='<?php echo $asman->id; ?>' data-toggle='modal' data-target="#myModal">Terima</button> 
              </td>
            </tr>
            <?php } ?>
          </div>
        </tbody>
        <tfoot>
          <tr>
            <th>Matakuliah</th>
            <th>Nama Mahasiswa</th>
            <th>Nilai</th>
            <th>IPK</th>
            <th>Nama Dosen</th>
            <th>Kelas</th>
            <th>Aksi</th>
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