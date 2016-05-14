<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Mahasiswa</h3>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Status</th>
                 <!--  <th>Aksi</th> -->
                </tr>
              </thead>
              <tbody>

               <?php foreach ($mahasiswa as $mhs) { ?>
                <form role="form" method="post" action="<?php echo 'datamhs/change' ?>">
                <tr>
                  <td><?php echo $mhs->nim; ?></td>
                  <td><?php echo $mhs->nama; ?></td>
                  <input type="hidden" name="id" value="<?php echo $mhs->id; ?>">
                  <input type="hidden" name="status" value="<?php echo $mhs->status; ?>">
                  <?php if ($mhs->status == 0): ?>
                  <td><?php echo 'Tidak Aktif'; ?></td>
                <?php else: ?>
                <td><?php echo 'Aktif'; ?></td>
              <?php endif; ?>
             <td><button type="submit" class="btn btn-info">Change</button></td>
            </tr>
             </form>
          <?php } ?>
          </div>
        </tbody>
        <tfoot>
          <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Status</th>
           <!--  <th>Aksi</th> -->
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