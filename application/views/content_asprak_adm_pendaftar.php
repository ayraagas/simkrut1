<section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Calon Asisten Praktikum <?php echo "$tahunajaran->tahun "; echo "$tahunajaran->semester"; ?></h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
         <table id="example2" class="table table-bordered table-hover">
           <thead>
             <tr>
               <th>Nama Mahasiswa</th>
               <th>Aksi</th>
               <?php foreach ($matakuliah as $mk) { ?>
                 <th><?php echo $mk->nama; ?></th>
                 <?php } ?>
               </tr>
             </thead>
             <tbody>
               <?php foreach ($dataNilai as $nama_mhs=> $asprak): ?>
                 <tr>

                   <td><?php echo $nama_mhs; ?></td>
                   <td>     <?php foreach ($dataId as $id): ?>
                     <a href="<?php echo 'dataasprak/delete'."?id={$id}"; ?>" class="btn btn-danger btn-delete">Hapus</a> <!-- data-id buat hapus -->
                   <?php endforeach ?>
                   </td>
                   <?php foreach ($matakuliah as $mk): ?>
                     <?php $nilai=$asprak[$mk->nama]; ?>
                     <?php if ($nilai==5): ?>
                      <td>A</td>
                    <?php elseif ($nilai==4): ?>
                     <td>A-</td>
                   <?php elseif ($nilai==3): ?>
                    <td>A/B</td>
                  <?php elseif ($nilai==2): ?>
                    <td>B+</td>
                  <?php elseif ($nilai==1): ?>
                    <td>B</td>
                  <?php else: ?>
                    <td></td>
                  <?php endif ?>
                <?php endforeach ?>
              </tr>
            <?php endforeach ?>
          </div>
        </tbody>
        <tfoot>
         <tr>
           <th>Nama Mahasiswa</th>
           <th>Aksi</th>
           <?php foreach ($matakuliah as $mk) { ?>
             <th><?php echo $mk->nama; ?></th>
             <?php } ?>
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