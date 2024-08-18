<?php 
class halInput extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		// model
		$this->load->model('Data_model');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['judul'] = 'Halaman Lokasi';
		$data['lokasi'] = $this->Data_model->getAllLokasi();

		$this->load->view('header', $data);
		$this->load->view('halamanLokasi', $data);
		$this->load->view('footer');
	}

	public function edit($id){
		$data['judul'] = 'Halaman edit Lokasi';
		$data['lokasi'] = $this->Data_model->getLokasiById($id);
	
		$this->form_validation->set_rules('namaLokasi', 'Nama Lokasi', 'required');
		$this->form_validation->set_rules('negara', 'Negara', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header', $data);
			$this->load->view('halEditLokasi', $data);
			$this->load->view('footer');
		} else {
			$dataUpdate = [
				"namaLokasi" => $this->input->post('namaLokasi', true),
				"negara" => $this->input->post('negara', true),
				"provinsi" => $this->input->post('provinsi', true),
				"kota" => $this->input->post('kota', true)
			];
			$response = $this->Data_model->editLokasi($id, $dataUpdate);
			
			$this->session->set_flashdata('flash', 'DiUpdate');
			redirect('halInput/index');
		}
	}
	

	public function tambah(){
		$data['judul'] = 'Halaman Input';
		$this->form_validation->set_rules('namaLokasi', 'Nama Lokasi', 'required');
		$this->form_validation->set_rules('negara', 'Negara', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header', $data);
			$this->load->view('halInputLokasi');
			$this->load->view('footer');
		} else {
			$data = [
                "namaLokasi" => $this->input->post('namaLokasi', true),
                "negara" => $this->input->post('negara', true),
                "provinsi" => $this->input->post('provinsi', true),
                "kota" => $this->input->post('kota', true)
            ];

			$response = $this->Data_model->tambahLokasi($data);
			
			if ($response) {
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('halUtama');
            } else {
                $this->session->set_flashdata('flash', 'Gagal menambahkan lokasi');
                redirect('halInput/tambah');
            }
		}
		
	}
	
}

?>
