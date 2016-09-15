     <!-- Main content -->
     <section class="content">
       <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Calon Asisten Mandiri Semester <?php echo "$tahunajaran->semester $tahunajaran->tahun"; ?> <!-- Semester Genap 2015/2016 --></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="asman/daftar" method="POST">
          <div class="box-body">
            <div class="form-group">
              <label for="ipk">IPK</label>
              <input type="number" step="0.01" min="0.00" max="4.00" name="ipk" class="form-control" placeholder="Masukkan IPK contoh : 3.55 *jangan pakai koma!*" required>
            </div>
            <div class="form-group">
              <label>- Jika berminat menjadi asisten matakuliah kurikulum 2016, pilih nilai A di matakuliah tersebut.</label><br>
              <label>- Isikan nilai raihan Anda untuk matakuliah yang anda minati sebagai asisten.</label><br><br>
              <?php $nilai = array("A", "A-", "A/B", "B+"); ?>
              <?php foreach ($matakuliah as $mk) { ?>
                <?php if ($mk->semester == $tahunajaran->semester AND $mk->jenis <> 'Praktikum') { ?>
                <div class="form-group">
                  <label><?php echo $mk->nama; ?></label>
                  <select class="form-control" name="matakuliah[<?php echo $mk->id; ?>]">
                    <option></option>
                    <?php foreach ($nilai as $n) { ?>
                      <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <?php } }?>
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