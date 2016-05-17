<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Mahasiswa</h3>
        </div>
        <div class="box-body">
            <table id="table-mhs" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

               <?php foreach ($mahasiswa as $mhs) { ?>
                
                <tr>
                  <!-- <form role="form" method="post" action="<?php echo 'datamhs/change'; ?>"> -->
                    <td><?php echo $mhs->nim; ?></td>
                    <td><?php echo $mhs->nama; ?></td>
                    <!--<input type="hidden" name="id" value="<?php echo $mhs->id; ?>" />
                    <input type="hidden" name="status" value="<?php echo $mhs->status; ?>" />-->
                    <?php if ($mhs->status == 0): ?>
                    <td><?php echo 'Tidak Aktif'; ?></td>
                    <?php else: ?>
                    <td><?php echo 'Aktif'; ?></td>
                    <?php endif; ?>
                   <td>
                    <!--
                    <button type="submit" class="btn btn-info" name="action" value="change">Change</button>
                    <button type="submit" class="btn btn-danger btn-delete" name="action" value="delete">Delete</button>
                    -->
                    <a href="<?php echo 'datamhs/change'."?id={$mhs->id}&status={$mhs->status}"; ?>" class="btn btn-info">Change</a>
                    <a href="<?php echo 'datamhs/delete'."?id={$mhs->id}"; ?>" class="btn btn-danger btn-delete">Delete</a>
                   </td>
                  </form>
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
 
 
  <!-- /.box-body -->
</div>
<!-- /.box -->


</section>

<!-- /.content -->
</div>