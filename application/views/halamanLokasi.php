<div class="container">
	<?php if($this->session->flashdata('flash')) : ?>
	<div class="row-mt-3">
		<div class="col-mt-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Lokasi proyek <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="row mt-3">
		<div class="col-mt-6">
			<h4>Daftar Lokasi Proyek</h4>
			<a href="<?php base_url(); ?>halInput/tambah">
				<button type="button" class="btn btn-primary mb-2">+</button>
			</a>
			<table mat-table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Lokasi</th>
						<th>Negara</th>
						<th>Provinsi</th>
						<th>Kota</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($lokasi as $pryklks) : ?>
					<tr>
						<td><?= $pryklks['id'] ?></td>
						<td><?= $pryklks['namaLokasi'] ?></td>
						<td><?= $pryklks['negara'] ?></td>
						<td><?= $pryklks['provinsi'] ?></td>
						<td><?= $pryklks['kota'] ?></td>
						<td>
							<a href="<?= base_url(); ?>halInput/edit/<?= $pryklks['id']; ?>">
								<button type="button" class="btn btn-info">
									<i class="bi bi-pencil"></i>
								</button>
							</a>
							<a href="<?= base_url(); ?>halInput/hapus/<?= $pryklks['id']; ?>" onclick="return confirm('Are you sure delete this row?');">
								<button type="button" class="btn btn-danger">
									<i class="bi bi-trash"></i>
								</button>
							</a>
						</td>
					</tr>
					<?php endforeach ?>  
				</tbody>
			</table>
		</div>
	</div>
</div>


