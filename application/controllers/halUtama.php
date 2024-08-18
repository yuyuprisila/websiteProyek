<?php 
	class halUtama extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();

			// model
			$this->load->model('Data_model');
			$this->load->library('form_validation');
		}

		public function index() 
		{
			$data['judul'] = 'Halaman Utama';
			$data['proyek'] = $this->Data_model->getAllData();

			// Ubah format tanggal
			foreach ($data['proyek'] as &$proyek) {
				// Pastikan tanggal valid sebelum format
				$proyek['tgl_mulai'] = !empty($proyek['tgl_mulai']) ? date('d-m-Y', strtotime($proyek['tgl_mulai'])) : 'Tanggal tidak tersedia';
				$proyek['tgl_selesai'] = !empty($proyek['tgl_selesai']) ? date('d-m-Y', strtotime($proyek['tgl_selesai'])) : 'Tanggal tidak tersedia';
			}

			// Kirim data ke view
			$this->load->view('header', $data);
			$this->load->view('halamanUtama', $data);
			$this->load->view('footer'); 
		}

		
		public function hapus($id){
			$this->Data_model->hapusLokasi($id);
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect('halUtama');
		}

		public function proyek($id) 
		{
			$data['judul'] = 'Halaman Proyek';
			$data['proyek_lokasi'] = $this->Data_model->getAllProyekById();

			$this->load->view('header', $data);
			$this->load->view('halProyek', $data);
			$this->load->view('footer'); 
		}

		public function tambah() 
		{
			$data['judul'] = 'Halaman Input Proyek';
			$this->form_validation->set_rules('namaProyek', 'Nama Proyek', 'required');
			$this->form_validation->set_rules('client', 'Nama Client', 'required');
			$this->form_validation->set_rules('tglMulai', 'Start Date', 'required');
			$this->form_validation->set_rules('tglSelesai', 'End Date', 'required');
			$this->form_validation->set_rules('pimpinanProyek', 'Nama Pimpinan Proyek', 'required');
			$this->form_validation->set_rules('keterangan', 'Note', 'required');
			$this->form_validation->set_rules('namaLokasi', 'Nama Lokasi', 'required');
			$this->form_validation->set_rules('negara', 'Negara', 'required');
			$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
			$this->form_validation->set_rules('kota', 'Kota', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('header', $data);
				$this->load->view('halInputProyek');
				$this->load->view('footer');
			} else {
				$tglMulai = DateTime::createFromFormat('Y-m-d', $this->input->post('tglMulai', true))->format('Y-m-d\TH:i:s');
				$tglSelesai = DateTime::createFromFormat('Y-m-d', $this->input->post('tglSelesai', true))->format('Y-m-d\TH:i:s');

				$data = [
					"namaProyek" => $this->input->post('namaProyek', true),
					"client" => $this->input->post('client', true),
					"tglMulai" => $tglMulai,
					"tglSelesai" => $tglSelesai,
					"pimpinanProyek" => $this->input->post('pimpinanProyek', true),
					"keterangan" => $this->input->post('keterangan', true),
					"namaLokasi" => $this->input->post('namaLokasi', true),
					"negara" => $this->input->post('negara', true),
					"provinsi" => $this->input->post('provinsi', true),
					"kota" => $this->input->post('kota', true)
				];

				$response = $this->Data_model->tambahProyek($data);
				
				if ($response) {
					$this->session->set_flashdata('flash', 'Ditambahkan');
					redirect('halUtama');
				} else {
					$this->session->set_flashdata('flash', 'Gagal menambahkan proyek');
				}
			}
		}

		public function edit($id) 
		{
			$data['judul'] = 'Halaman Edit Proyek';
			$data['proyek'] = $this->Data_model->getProyekById($id);
			$data['lokasi'] = $this->Data_model->getAllLokasi();

			$this->form_validation->set_rules('namaProyek', 'Nama Proyek', 'required');
			$this->form_validation->set_rules('client', 'Nama Client', 'required');
			$this->form_validation->set_rules('tglMulai', 'Start Date', 'required');
			$this->form_validation->set_rules('tglSelesai', 'End Date', 'required');
			$this->form_validation->set_rules('pimpinanProyek', 'Nama Pimpinan Proyek', 'required');
			$this->form_validation->set_rules('keterangan', 'Note', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('header', $data);
				$this->load->view('halEditProyek', $data);
				$this->load->view('footer');
			} else {
				$tglMulai = DateTime::createFromFormat('Y-m-d', $this->input->post('tglMulai', true))->format('Y-m-d\TH:i:s');
        		$tglSelesai = DateTime::createFromFormat('Y-m-d', $this->input->post('tglSelesai', true))->format('Y-m-d\TH:i:s');

				$data = [
					"namaProyek" => $this->input->post('namaProyek', true),
					"client" => $this->input->post('client', true),
					"tglMulai" => $tglMulai,
					"tglSelesai" => $tglSelesai,
					"pimpinanProyek" => $this->input->post('pimpinanProyek', true),
					"keterangan" => $this->input->post('keterangan', true)
				];
				// // Debugging output
				// echo '<pre>';
				// print_r($data);
				// echo '</pre>';
				// exit;
				$response = $this->Data_model->edit($id, $data);
				
				$this->session->set_flashdata('flash', 'DiUpdate');
				redirect('halUtama');
			}
		}

	}
?>
