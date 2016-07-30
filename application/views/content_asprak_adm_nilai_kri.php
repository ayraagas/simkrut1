<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data Nilai kriteria Calon Asisten Praktikum <?php echo "$tahunajaran->tahun "; echo "$tahunajaran->semester"; ?></h3>
				</div>
				<div class="box-body">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah</button>
					<div class="table-responsive">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Nama Mahasiswa</th>
									<th>Aksi</th>
									<?php foreach ($kriteria as $k) { ?>
										<th><?php echo $k->nama; ?></th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($dataNilaiKri as $nama_alt=> $subkri): ?>
										<tr>

											<td><?php echo $nama_alt; ?></td>
											<td><?php foreach ($dataIdAlt as $id): ?>
												<a href="<?php echo 'dataasprak/ubah_nilai_alt'."?id={$id}"; ?>" class="btn btn-danger btn-info">Ubah</a> <!-- data-id buat ubah -->
											<?php endforeach ?>
										</td>
										<?php foreach ($kriteria as $k): ?>
											<?php $nilai=$subkri[$k->nama]; ?>
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
								<?php foreach ($kriteria as $k) { ?>
									<th><?php echo $k->nama; ?></th>
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
									<h4 class="modal-title">Tambah Nilai Kriteria</h4>
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
												<?php foreach ($kriteria as $k) { ?>
													<label class="col-sm control-label"><?php echo $k->nama; ?></label>
													<input class="form-control" type="number" min="0" name="subkriteria[<?php echo $k->id; ?>]" required><br>
													<?php } ?>
													<button type="submit" class="btn btn-info">Tambah</button>
												</form>

											</div></div>

										</div>

								</section>

								<!-- /.content -->
							</div>