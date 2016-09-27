 <!-- Main content -->
   <section class="content">
     <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Calon Asisten Praktikum Semester <?php echo "$tahunajaran->semester $tahunajaran->tahun"; ?> <!-- Semester Genap 2015/2016 --></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="asprak/daftar" method="POST">
              <div class="box-body">
              <div class="form-group">
              <label for="angkatan">Angkatan</label>
              <input type="number" min="1900" step="1" class="form-control" name="angkatan" placeholder="Contoh : 2012" required>
              </div>
                 <div class="form-group">
                   <label style="color: red;">*Masukkan Nilai Matakuliah minimal 3 Matakuliah Teori dan 3 Matakuliah Praktikum</label>
              <?php $nilai = array("A", "A-", "A/B", "B+", "B"); ?>
              <?php foreach ($matakuliah as $mk) { ?>
                <?php if ($mk->jenis =="Praktikum") { ?>
                <div class="form-group">
                  <label><?php echo $mk->nama; ?></label>
                  <select class="form-control" name="matakuliah[<?php echo $mk->id; ?>]">
                    <option></option>
                    <?php $i=5;?> 
                    <?php foreach ($nilai as $n) { ?>
                      <option value="<?php echo $i--; ?>"><?php echo $n; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <?php } }?>
                </div>
                 <input type="hidden" name="tipe" value="Praktikum"></input>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>

   </section>
    <!-- /.content -->
  </div>