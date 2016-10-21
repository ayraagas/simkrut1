 <section class="content">
 	<div class="box box-primary">
 		<div class="box-header with-border">
 			<h3 class="box-title">Ubah No Handphone</h3>
 		</div>
 		<div class="box-body">
 				<form action="ubahnohp/change" method="POST" accept-charset="utf-8">
 					<?php foreach ($no_telp as $notelp): ?>
 						<div class="form-group fa fa-phone">
 							<label>No. Handphone : </label>
 							<input type="text" class="form-control" value="<?php echo "$notelp"; ?>" disabled>
 						<?php endforeach ?>
 					</div>
 					<div class="input-group">
 						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
 						<input type="number" class="form-control" placeholder="Nomer Handphone Baru" name="no_telp" required>
 					</div>
 					<br>
 					</div>
 					<div class="box-footer">
 						<button type="submit" class="btn btn-primary">Submit</button>
 					</div>
 			</form>
 			<!-- /.box-body -->
 		</section>
 		<!-- /.content -->
 	</div>