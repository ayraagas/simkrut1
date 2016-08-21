<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Tahunajaran</h3>
        </div>
        <div class="box-body">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah</button><br><br>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Tahun</th>
                <th>Semester</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

             <?php foreach ($tahunajaran as $thn) { ?>
              <tr>
                <td><?php echo $thn->tahun; ?></td>
                <td><?php echo $thn->semester; ?></td>
                <?php if ($thn->status == 0): ?>
                <td><?php echo 'Tidak Aktif'; ?></td>
              <?php else: ?>
              <td><?php echo 'Aktif'; ?></td>
            <?php endif; ?><td>
            <a href="<?php echo 'tahunajaran/change'."?id={$thn->id}&status={$thn->status}"; ?>" class="btn btn-info">Change</a>
            <a href="<?php echo 'tahunajaran/delete'."?id={$thn->id}"; ?>" class="btn btn-danger btn-delete">Delete</a>
          </td>
        </tr>
        <?php } ?>
      </div>
    </tbody>
    <tfoot>
      <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>Status</th>
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
        <h4 class="modal-title">Tambah Tahun Ajaran</h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" method="POST" action="<?php echo 'tahunajaran/tambah' ?>">
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label" >Tahun</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="tahun" placeholder="Tahun ex: 2016/2017">
            </div>
          </div><div class="form-group">
          <label class="col-sm-2 control-label">Semester</label>
          <div class="col-sm-10">
           <select name="semester" class="form-control">
            <option  value="Ganjil">Ganjil</option>
            <option  value="Genap">Genap</option>
          </select>
        </div>
      </div></div>

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