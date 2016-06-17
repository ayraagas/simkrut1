<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Sub Kriteria</h3>
        </div>
        <div class="box-body">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah</button>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Bobot</th>
                <th>Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

             <?php foreach ($subkriteria as $skr) { ?>
              <tr>
                <td><?php echo $skr->nama; ?></td>
                <td><?php echo $skr->bobot; ?></td>
                <td><?php echo $skr->kategori; ?></td>
                <td>
                 <button type="button" class="btn btn-warning fa fa-pencil-square-o" id="ubahsubkriteria" data-toggle="modal" data-target="#myModal1" data-id='<?php echo $skr->id; ?>' data-nama='<?php echo $skr->nama; ?>' data-bobot='<?php echo $skr->bobot; ?>' data-kategori='<?php echo $skr->kategori; ?>' "> Ubah</button>
                 <a href="<?php echo 'datasubkriteria/delete'."?id={$skr->id}"; ?>" class="btn btn-danger btn-delete fa fa-minus-circle"> Delete</a></td>
               </tr>
             </form>
             <?php } ?>
           </div>
         </tbody>
         <tfoot>
          <tr>
           <th>Nama</th>
           <th>Bobot</th>
           <th>Kategori</th>
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
          <h4 class="modal-title">Tambah Sub Kriteria</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?php echo 'datasubkriteria/tambah' ?>">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label" >Nama</label>
                <input type="hidden" name="id_kriteria" value="<?php echo $id_kriteria ?>">
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" >Bobot</label>

              <div class="col-sm-10">
                <input type="number" min="1" max="5" class="form-control" name="bobot">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" >Kategori</label>
              <div class="col-sm-10">
                <select name="kategori">
                  <option value="benefit">Benefit</option>
                  <option value="cost">Cost</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

   <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Ubah Sub Kriteria</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?php echo 'datasubkriteria/ubah' ?>">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label" >Nama</label>
              <div class="col-sm-10">
              <input type="hidden" name="id" id="id" value="<?php $id ?>">
                <input type="text" class="form-control" name="nama" id="nama" value="<?php $nama ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" >Bobot</label>

              <div class="col-sm-10">
                <input type="number" min="1" max="5" class="form-control" name="bobot" id="bobot" value="<?php $bobot ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" >Kategori</label>
              <div class="col-sm-10">
                <select name="kategori" id="kategori">
                  <option value="benefit">benefit</option>
                  <option value="cost">cost</option>
                </select>
              </div>
            </div>
          </div>
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