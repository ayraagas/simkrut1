<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data Nilai Calon Asisten Praktikum <?php echo "$tahunajaran->tahun "; echo "$tahunajaran->semester"; ?></h3>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table id="example2" class="table table-bordered table-hover display">
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

								<?php foreach ($dataNilaiSub as $nama_alt=> $sub): ?>
									<tr>

										<td><?php echo $nama_alt; ?></td>
										<td><?php $id=$sub['id']; ?>
											<a href="<?php echo 'home_penguji/ubahnilai'."?id={$id}"."&nama={$nama_alt}"; ?>" class="btn btn-warning">Ubah</a>
										</td>
										<?php foreach ($subkriteria as $sk): ?>
											<?php $nilai=$sub['nilai'][$sk->nama]; ?>

											<td><?php echo $nilai; ?></td>
										<?php endforeach ?>
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
					<div class="table-responsive">
						<table id="example2" class="table table-bordered table-hover display">
							<thead>
								<tr>
									<th>Nama Mahasiswa</th>
									<?php foreach ($kriteria as $k) { ?>
									<th><?php echo $k->nama; ?></th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								
								<?php foreach ($dataNilaiKri as $nama_alt=> $kri): ?>
									<tr>

										<td><?php echo $nama_alt; ?></td>


										<?php foreach ($kriteria as $k): ?>
											<?php $nilai=$kri['nilai'][$k->nama]; ?>
											<td><?php echo $nilai; ?></td>
										<?php endforeach ?>
									<?php endforeach ?>

								</tr>
							</div>
						</tbody>
						<tfoot>
							<tr>
								<th>Nama Mahasiswa</th>
								<?php foreach ($kriteria as $k) { ?>
								<th><?php echo $k->nama; ?></th>
								<?php } ?>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>

	</div>

</section>

<!-- /.content -->
</div>