<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Matakuliah</h3>
        </div>
        <div class="box-body">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah</button>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addViaCSV">Tambah via CSV</button>
          <?php if (isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('success') == TRUE): ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
          <?php endif; ?>
          <a href="datamk/delete_all" class="btn btn-danger btn-delete">HAPUS SEMUA!</a><br><br>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Semester</th>
                <th>Jenis</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

             <?php foreach ($matakuliah as $mk) { ?>
              <tr>
                <td><?php echo $mk->nama; ?></td>
                <td><?php echo $mk->semester; ?></td>
                <td><?php echo $mk->jenis; ?></td>
                <td>
                  <a href="<?php echo 'datamk/delete'."?id={$mk->id}"; ?>" class="btn btn-danger btn-delete">Delete</a>
                </td>
              </tr>
              <?php } ?>
            </div>
          </tbody>
          <tfoot>
            <tr>
              <th>Nama</th>
              <th>Semester</th>
              <th>Jenis</th>
                <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>

      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Matakuliah</h4>
            </div>
            <div class="modal-body">
             <form class="form-horizontal" method="POST" action="<?php echo 'datamk/tambah' ?>">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label" >Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" placeholder="Matakuliah" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Semester</label>
                  <div class="col-sm-10">
                   <select name="semester" class="form-control" required>
                    <option></option>
                    <option  value="Ganjil">Ganjil</option>
                    <option  value="Genap">Genap</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis</label>
                <div class="col-sm-10">
                 <select name="jenis" class="form-control" required>
                  <option></option>
                  <option  value="Wajib">Wajib</option>
                  <option  value="Pilihan">Pilihan</option>
                  <option  value="Praktikum">Praktikum</option>
                </select>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="addViaCSV" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Upload CSV Matakuliah</h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" method="POST" action="<?php echo 'datamk/importcsv' ?>" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label" >Upload File : </label>

            <div class="col-sm-10">
              <input type="file" class="form-control" name="userfile" required>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary" value="UPLOAD">Submit</button>
      </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- /.box-body -->
</div>
<!-- /.box -->

</section>

<!-- /.content -->
</div>