<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Penguji</h3>
        </div>
        <div class="box-body">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah</button><br><br>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

             <?php foreach ($penguji as $pgj) { ?>
              <tr>
                <td><?php echo $pgj->nama; ?></td><td>
                <a href="<?php echo 'datapenguji/delete'."?id={$pgj->id}"; ?>" class="btn btn-danger btn-delete">Delete</a></td>
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
            <h4 class="modal-title">Tambah Penguji</h4>
          </div>
          <div class="modal-body">
           <form class="form-horizontal" method="POST" action="<?php echo 'datapenguji/tambah' ?>">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label" >Nama</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" placeholder="Penguji">
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

<!-- /.box-body -->
</div>
<!-- /.box -->


</section>

<!-- /.content -->
</div>