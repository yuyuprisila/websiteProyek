<div class="container">
	<div class="row mt-3">
		<div class="col-mt-6">
			<div class="card">
				<div class="card-header">
					Input Lokasi
				</div>
				<div class="card-body">
					<form action="" method="post">
						<div class="mb-3">
							<label for="namaLokasi" class="form-label">Lokasi</label>
							<input type="text" class="form-control" id="namaLokasi" name="namaLokasi" placeholder="Masukkan nama lokasi proyek">
						</div>
		
						<div class="mb-3">
							<label for="negara" class="form-label">Negara</label>
							<select class="form-select" id="negara" name="negara" onchange="updateProvinsi()">
								<option value="">Pilih Negara</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Singapura">Singapura</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="provinsi" class="form-label">Provinsi</label>
							<select class="form-select" name="provinsi" id="provinsi" onchange="updateKota()">
								<option value="">Pilih Provinsi</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="kota" class="form-label">Kota</label>
							<select class="form-select" name="kota" id="kota">
								<option value="">Pilih Kota</option>
							</select>
						</div>
						<?php if (validation_errors()) :?>
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
						<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
					</form>
				</div>
			</div>


			<script>
				const data = {
					"Indonesia": {
						"Jawa Barat": ["Bandung", "Bogor", "Depok"],
						"Jawa Tengah": ["Semarang", "Solo", "Magelang"],
						"Jawa Timur": ["Surabaya", "Malang", "Kediri"]
					},
					"Malaysia": {
						"Selangor": ["Shah Alam", "Petaling Jaya", "Klang"],
						"Johor": ["Johor Bahru", "Batu Pahat", "Muar"]
					},
					"Singapura": {
						"Central": ["Bishan", "Bukit Merah", "Geylang"],
						"North-East": ["Hougang", "Punggol", "Sengkang"]
					}
				};

				function updateProvinsi() {
					const negara = document.getElementById("negara").value;
					const provinsiSelect = document.getElementById("provinsi");
					const kotaSelect = document.getElementById("kota");

					provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
					kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';

					if (negara && data[negara]) {
						const provinsiList = Object.keys(data[negara]);
						provinsiList.forEach(provinsi => {
							const option = document.createElement("option");
							option.value = provinsi;
							option.textContent = provinsi;
							provinsiSelect.appendChild(option);
						});
					}
				}

				function updateKota() {
					const negara = document.getElementById("negara").value;
					const provinsi = document.getElementById("provinsi").value;
					const kotaSelect = document.getElementById("kota");

					kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';

					if (negara && provinsi && data[negara][provinsi]) {
						const kotaList = data[negara][provinsi];
						kotaList.forEach(kota => {
							const option = document.createElement("option");
							option.value = kota;
							option.textContent = kota;
							kotaSelect.appendChild(option);
						});
					}
				}
			</script>

		</div>
	</div>
</div>
