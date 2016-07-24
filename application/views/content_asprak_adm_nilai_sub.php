<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data Nilai Subkriteria Calon Asisten Praktikum <?php echo "$tahunajaran->tahun "; echo "$tahunajaran->semester"; ?></h3>
				</div>
				<div class="box-body">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah</button>
					<div class="table-responsive">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Nama Mahasiswa</th>
									<th>Aksi</th>
									<?php foreach ($subkriteria as $sk) { ?>
										<th><?php echo $sk->nama; ?></th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($dataNilaiSub as $nama_alt=> $subalt): ?>
										<tr>

											<td><?php echo $nama_alt; ?></td>
											<?php $id=$subalt['id']; ?>
											<td>
											<a href="<?php echo 'dataasprak/resetnilaisub'."?id={$id}"; ?>" class="btn btn-danger btn-delete">Reset</a>
											</td>

											<?php foreach ($subkriteria as $sk): ?>
												<?php $nilai=$subalt['nilai'][$sk->nama]; ?>
												<td><?php echo $nilai; ?></td>
											<?php endforeach ?>
										</tr>
									<?php endforeach ?>
								</div>
							</tbody>
							<tfoot>
								<tr>
									<th>Nama Mahasiswa</th>
									<th>Aksi</th>
									<?php foreach ($subkriteria as $sk) { ?>
										<th><?php echo $sk->nama; ?></th>
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
									<h4 class="modal-title">Tambah Nilai Subkriteria</h4>
								</div>
								<div class="modal-body">
									<form class="form-horizontal" method="POST" action="<?php echo 'dataasprak/tambahnilaisub' ?>">
										<div class="box-body">
											<div class="form-group">
												<label class="col-sm control-label">Nama Alternatif</label>
												<select name="alternatif" class="form-control">
													<?php foreach ($alternatif as $alt): ?>
														<option value=<?php echo "$alt->id"; ?>><?php echo $alt->nama; ?></option>
													<?php endforeach ?>
												</select>
												<?php foreach ($subkriteria as $sk) { ?>
													<label class="col-sm control-label"><?php echo $sk->nama; ?></label>
													<input class="form-control" type="number" min="0" name="subkriteria[<?php echo $sk->id; ?>]" required><br>
													<?php } ?>
													<button type="submit" class="btn btn-info">Tambah</button>
												</form>

											</div></div>

										</div>

									</section>

									<!-- /.content -->
								</div>