<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Kriteria</h3>
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

             <?php foreach ($kriteria as $kr) { ?>
              <tr>
                <td><?php echo $kr->nama; ?></td>
                <td><?php echo $kr->bobot; ?></td>
                <td><?php echo $kr->kategori; ?></td>
                <td>
                <a href="<?php echo 'datasubkriteria'."?id={$kr->id}"; ?>" class="btn btn-primary fa fa-eye"> SubKriteria</a>
                 <button type="button" class="btn btn-warning fa fa-pencil-square-o" id="ubahkriteria" data-toggle="modal" data-target="#myModal1" data-id='<?php echo $kr->id; ?>' data-nama='<?php echo $kr->nama; ?>' data-bobot='<?php echo $kr->bobot; ?>' data-kategori='<?php echo $kr->kategori; ?>' "> Ubah</button>
                 <a href="<?php echo 'datakriteria/delete'."?id={$kr->id}"; ?>" class="btn btn-danger btn-delete fa fa-minus-circle"> Delete</a></td>
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
          <h4 class="modal-title">Tambah Kriteria</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?php echo 'datakriteria/tambah' ?>">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label" >Nama</label>

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
          <h4 class="modal-title">Ubah Kriteria</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?php echo 'datakriteria/ubah' ?>">
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