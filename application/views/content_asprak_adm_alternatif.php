<section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Alternatif Praktikum <?php echo "$tahunajaran->tahun "; echo "$tahunajaran->semester"; ?></h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
         <table id="example2" class="table table-bordered table-hover">
           <thead>
             <tr>
               <th>Nama Mahasiswa</th>
               <th>Angkatan</th>
               <th>Hasil</th>
               <th>Status</th>
               <th>Aksi</th>
             </tr>
           </thead>
           <tbody>
             <?php foreach ($alternatif as $alt): ?>
               <tr>

                 <td><?php echo $alt->nama; ?></td>
                 <td><?php echo $alt->angkatan; ?></td>
                 <td><?php echo $alt->hasil; ?></td>
                 <?php if ($alt->status==0): ?>
                   <td style="color: rgb(12, 85, 255);">Diterima</td>
                 <?php else: ?>
                   <td style="color: red;">Tidak Diterima</td>
                 <?php endif ?>
                 <td><a href="<?php echo 'dataasprak/terima'."?id={$alt->id_asisten}"; ?>" class="btn btn-info">Ubah Status</a> <!-- data-id buat hapus -->
                 </td>
               </tr>
             <?php endforeach ?>
           </div>
         </tbody>
         <tfoot>
           <tr>
            <th>Nama Mahasiswa</th>
            <th>Angkatan</th>
            <th>Hasil</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Dosen</h4>
        </div>
        <div class="modal-body">
         <form class="form-horizontal" method="POST" action="<?php echo 'dataasman/terima' ?>">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm control-label">Dosen</label>
              <?php $id= $this->input->get('id');?>
              <input type="hidden" class="id_asisten" name="id_asisten" value="<?php $id ?>">
              <select name="dosen" class="form-control">
                <?php foreach ($dosen as $dsn) {?>
                 <option value="<?php echo $dsn->id ?>"><?php echo "$dsn->nama"; ?></option>
                 <?php } ?>
               </select>
               <label class="col-sm control-label">Kelas</label>
               <select name="kelas" class="form-control">
                <option value=""></option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
              </select><br>
              <button type="submit" class="btn btn-info">Tambah</button>
            </form>

          </div></div>

        </div>

      </section>

      <!-- /.content -->
    </div>