 <section class="content">
 	<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Ubah Nilai Kriteria <b style="color:green;"><?php echo $nama_alternatif; ?></b></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="POST" action="home_penguji/ubahnilai">
      <div class="box-body">
        <div class="form-group">
        <input type="hidden" name="id_alt" value="<?php echo $id_alternatif;?>" >
    <?php foreach ($dataNilaiKri as $nama_alt => $kri): ?>
     
                  <label><?php echo "$nama_alt"; ?></label>
                   <input type="number" class="form-control" name="kriteria[<?php echo $kri['id_kri']; ?>]" value="<?php echo $kri['nilai'];?>">
                <?php endforeach ?>  
     
    <?php foreach ($dataNilaiSub as $nama_alt => $sub): ?>
                  <label><?php echo "$nama_alt"; ?></label>
                   <input type="number" class="form-control" name="subkriteria[<?php echo $sub['id_kri']; ?>]" value="<?php echo $sub['nilai'];?>">
                <?php endforeach ?>  
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
</section>

<!-- /.content -->
</div>