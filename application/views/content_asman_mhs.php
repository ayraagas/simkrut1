     <!-- Main content -->
     <section class="content">
       <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Calon Asisten Mandiri <!-- Semester Genap 2015/2016 --></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="asman/daftar" method="POST">
          <div class="box-body">
            <div class="form-group">
              <label for="ipk">IPK</label>
              <input type="text" name="ipk" class="form-control" placeholder="Masukkan IPK contoh : 3.55 *jangan pakai koma!*">
            </div>
            <div class="form-group">
              <label>Masukkan Nilai Matakuliah</label>
              <?php $nilai = array("A", "A-", "A/B", "B+", "B"); ?>
              <?php foreach ($matakuliah as $mk) { ?>
                <?php if ($mk->semester == $tahunajaran->semester || $mk->jenis =="Pilihan") { ?>
                <div class="form-group">
                  <label><?php echo $mk->nama; ?></label>
                  <select class="form-control" name="matakuliah[<?php echo $mk->id; ?>]">
                    <option></option>
                    <?php foreach ($nilai as $n) { ?>
                      <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <?php } ?>
                  <?phph } else {?>
                   <?php }?>
                 </div>
               </div>
               <input type="hidden" name="tipe" value="Mandiri"></input>
               <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>

          </section>

        </section>
      </section>

      <!-- /.content -->
    </div>
<!-- /.content-wrapper -->