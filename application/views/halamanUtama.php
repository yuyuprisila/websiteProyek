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
            <a href="<?php echo base_url(); ?>halUtama/tambah">
                <button type="button" class="btn btn-primary mb-2">+ Input Data</button>
            </a>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Proyek</th>
                        <th>Client</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Pimpinan Proyek</th>
                        <th>Deskripsi</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proyek as $pryklks) : ?>
                    <tr>
                        <td><?= $pryklks['id'] ?></td>
                        <td><?= $pryklks['proyek']['namaProyek'] ?></td>
                        <td><?= $pryklks['proyek']['client'] ?></td>
                        <td><?= $pryklks['proyek']['tgl_mulai'] ?></td>
                        <td><?= $pryklks['proyek']['tgl_selesai'] ?></td>
                        <td><?= $pryklks['proyek']['pimpinan_proyek'] ?></td>
                        <td><?= $pryklks['proyek']['keterangan'] ?></td>
                        <td>
                            <?php if (isset($pryklks['lokasi'])) : ?>
                                <?= $pryklks['lokasi']['namaLokasi'] ?>,
                                <?= $pryklks['lokasi']['kota'] ?>,
                                <?= $pryklks['lokasi']['provinsi'] ?>,
                                <?= $pryklks['lokasi']['negara'] ?>
                            <?php else : ?>
                                Tidak tersedia
                            <?php endif; ?>
                        </td>
                        <td>
                            
                            <a href="<?= base_url(); ?>halUtama/edit/<?= $pryklks['id']; ?>">
                                <button type="button" class="btn btn-info">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </a>
                            <a href="<?= base_url(); ?>halUtama/hapus/<?= $pryklks['id']; ?>" onclick="return confirm('Are you sure delete this row?');">
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
