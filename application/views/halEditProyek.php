<div class="container">
    <div class="row mt-3">
        <div class="col-mt-6">
            <div class="card">
                <div class="card-header">
                    Edit Proyek
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $proyek['proyek']['id']; ?>">

                        <div class="mb-3">
                            <label for="namaProyek" class="form-label">Nama Proyek</label>
                            <input type="text" class="form-control" id="namaProyek" name="namaProyek" placeholder="Masukkan nama proyek" value="<?= $proyek['proyek']['nama_proyek']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="client" class="form-label">Nama Client</label>
                            <input type="text" class="form-control" id="client" name="client" placeholder="Masukkan nama client" value="<?= $proyek['proyek']['client']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="tglmulai" class="form-label">Start Date</label>
                            <?php
                                $tglMulai = date('Y-m-d', strtotime($proyek['proyek']['tgl_mulai']));
                            ?>
                            <input type="date" class="form-control" id="tglmulai" name="tglMulai" placeholder="Thn/Bln/Hr" value="<?= $tglMulai; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="tglselesai" class="form-label">End Date</label>
                            <?php
                                $tglSelesai = date('Y-m-d', strtotime($proyek['proyek']['tgl_selesai']));
                            ?>
                            <input type="date" class="form-control" id="tglselesai" name="tglSelesai" placeholder="Thn/Bln/Hr" value="<?= $tglSelesai; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="pimpinan" class="form-label">Nama Pimpinan Proyek</label>
                            <input type="text" class="form-control" id="pimpinan" name="pimpinanProyek" placeholder="Masukkan nama pimpinan proyek" value="<?= $proyek['proyek']['pimpinan_proyek']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <input type="text" class="form-control" id="note" name="keterangan" placeholder="keterangan" value="<?= $proyek['proyek']['keterangan']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="lokasiId" class="form-label">Lokasi</label>
                            <select id="lokasiId" name="lokasiId" class="form-select">
                                <option value="">Pilih Lokasi</option>
                                <?php foreach ($lokasi as $loc): ?>
                                    <option value="<?= $loc['id']; ?>" <?= $loc['id'] == $proyek['lokasiId'] ? 'selected' : ''; ?>>
                                        <?= $loc['namaLokasi']; ?> - <?= $loc['kota']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <?php if (validation_errors()) : ?>
                        <div class="mb-3 alert alert-danger d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                                <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </symbol>
                            </svg>
                            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                                <?= validation_errors(); ?>
                            </div>
                        </div>
                        <?php endif ?>

                        <button type="submit" name="tambah" class="btn btn-primary float-right">Submit Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
