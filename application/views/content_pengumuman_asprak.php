<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Pengumuman Asisten Praktikum</h3>
        </div>
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Semester</th>
                <th>Tahun</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pengumuman as $pgn) { ?>
                <tr>
                  <td><?php echo $pgn->nama; ?></td>
                  <td><?php echo $pgn->semester; ?></td>
                  <td><?php echo $pgn->tahun; ?></td>
                </tr>
                <?php } ?>
              </div>
            </tbody>
            <tfoot>
              <tr>
                <th>Nama</th>
                <th>Semester</th>
                <th>Tahun</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <!-- /.box-body -->
</div>
<!-- /.box -->


</section>

<!-- /.content -->
</div>