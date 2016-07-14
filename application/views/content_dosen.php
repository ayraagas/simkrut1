<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Dosen</h3>
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
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

             <?php foreach ($dosen as $dsn) { ?>
              <tr>
                <td><?php echo $dsn->nama; ?></td><td>
                <a href="<?php echo 'datadosen/delete'."?id={$dsn->id}"; ?>" class="btn btn-danger btn-delete">Delete</a></td>
              </tr>
            </form>
            <?php } ?>
          </div>
        </tbody>
        <tfoot>
          <tr>
            <th>Nama</th>
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
            <h4 class="modal-title">Tambah Dosen</h4>
          </div>
          <div class="modal-body">
           <form class="form-horizontal" method="POST" action="<?php echo 'datadosen/tambah' ?>">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label" >Nama</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" placeholder="Dosen">
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
          <h4 class="modal-title">Upload CSV Dosen</h4>
        </div>
        <div class="modal-body">
         <form class="form-horizontal" method="POST" action="<?php echo 'datadosen/importcsv' ?>" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label" >Upload File : </label>

              <div class="col-sm-10">
                <input type="file" size="50" class="form-control" name="userfile">
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