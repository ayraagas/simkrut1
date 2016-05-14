 <!-- Main content -->
   <section class="content">
     <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">isikan dengan lengkap</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <div class="form-group">
              <label for="angkatan">Angkatan</label>
              <input type="text" class="form-control" name="angkatan" placeholder="Contoh : 2012"></input>
              </div>
                <!-- <div class="form-group">
                  <label for="exampleInputEmail1">IPK</label>
                  <input type="text" class="form-control" placeholder="Masukkan IPK contoh : 3.55 *jangan pakai koma!*">
                </div> -->
                 <div class="form-group">
                  <label>Pilih Matakuliah dan Isi nilai Matakuliah</label>
                  <select class="form-control">
                    <option>Algoritma dan Pemrograman 1</option>
                    <option>Pr. Algoritma & Pemrograman 1</option>
                    <option>Sistem Operasi</option>
                    <option>Pr. Sistem Operasi</option>
                    <option>Basis Data</option>
                    <option>Pr. Basisdata</option>
                    <option>Pemrograman Berorientasi Objek</option>
                    <option>Pr. Pemrograman Berorientasi Objek</option>
                    <option>Jaringan Komputer</option>
                    <option>Pr. Jaringan Komputer</option>
                    <option>Struktur Data</option>
                    <option>Pr. Struktur Data</option>
                    <option>Pemrograman Web</option>
                    <option>Pr. Pemrograman Web</option>
                  </select>
                  <br>
                  <input type="text" class="form-control" placeholder="Masukkan nilai contoh: A-">
                </div>
                <div id="divName"></div>
                <div id="form-group">
    <input type="button" class="btn btn-success" value="Tambah Matakuliah" onclick="addInput('form-group');" />
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>

   </section>
    <!-- /.content -->
  </div>