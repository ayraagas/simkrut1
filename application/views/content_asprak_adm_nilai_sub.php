<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data Nilai Subkriteria Calon Asisten Praktikum <?php echo "$tahunajaran->tahun "; echo "$tahunajaran->semester"; ?></h3>
				</div>
				<div class="box-body">
					
					<div class="table-responsive">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Nama Mahasiswa</th>
								<!-- 	<th>Aksi</th> -->
									<?php foreach ($subkriteria as $sk) { ?>
									<th><?php echo $sk->nama; ?></th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($dataNilaiSub as $nama_alt=> $subalt): ?>
									<tr>

										<td><?php echo $nama_alt; ?></td>
								<!-- 		<?php $id=$subalt['id']; ?>
										<td>
											<a href="<?php echo 'dataasprak/resetnilaisub'."?id={$id}"; ?>" class="btn btn-danger btn-delete">Reset</a>
										</td> -->

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
							<!-- 	<th>Aksi</th> -->
								<?php foreach ($subkriteria as $sk) { ?>
								<th><?php echo $sk->nama; ?></th>
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