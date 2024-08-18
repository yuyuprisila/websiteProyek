<?php 
class Data_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
        $this->load->database();
		date_default_timezone_set('Asia/Jakarta');
    }
	public function getAllData()
	{
		$url = "http://localhost:8088/proyek";
        $json = file_get_contents($url);
        return json_decode($json, true);
	}
	public function getAllLokasi()
	{
		$url = "http://localhost:8088/lokasi";
        $json = file_get_contents($url);
        return json_decode($json, true);
	}

	public function tambahLokasi($data){
		$url = "http://localhost:8088/lokasi/lokasiAdd"; 

		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json'
		]);

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			log_message('error', 'cURL Error: ' . curl_error($ch));
			return ['status' => 'error', 'message' => 'cURL Error: ' . curl_error($ch)];
		}
		curl_close($ch);

		return json_decode($response, true) ?: ['status' => 'error', 'message' => 'Invalid JSON response'];
	}

	public function tambahProyek($data){
		$url = "http://localhost:8088/proyek/addproyek";

		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json'
		]);

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			log_message('error', 'cURL Error: ' . curl_error($ch));
			return ['status' => 'error', 'message' => 'cURL Error: ' . curl_error($ch)];
		}

		curl_close($ch);

		return json_decode($response, true) ?: ['status' => 'error', 'message' => 'Invalid JSON response'];
	}

	public function hapusLokasi($id){
		$url = "http://localhost:8088/lokasi/lokasiDelete/".$id;
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	
		$response = curl_exec($ch);
	
		if (curl_errno($ch)) {
			log_message('error', 'cURL Error: ' . curl_error($ch));
			return ['status' => 'error', 'message' => 'cURL Error: ' . curl_error($ch)];
		} else {
			curl_close($ch);
		}
	}
	public function edit($id, $data){
		$url = "http://localhost:8088/proyek/proyekUpdate/".$id;
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json'
		]);

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			log_message('error', 'cURL Error: ' . curl_error($ch));
			return ['status' => 'error', 'message' => 'cURL Error: ' . curl_error($ch)];
		}

		curl_close($ch);

	}
	public function editLokasi($id, $data){
		$url = "http://localhost:8088/lokasi/lokasiUpdate/".$id;
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json'
		]);

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			log_message('error', 'cURL Error: ' . curl_error($ch));
			return ['status' => 'error', 'message' => 'cURL Error: ' . curl_error($ch)];
		}

		curl_close($ch);

	}

	public function getProyekById($id){
		$url = "http://localhost:8088/proyek/getProyekById/" . $id;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            log_message('error', 'cURL Error: ' . curl_error($ch));
            return ['status' => 'error', 'message' => 'cURL Error: ' . curl_error($ch)];
        }

        curl_close($ch);

        return json_decode($response, true) ?: ['status' => 'error', 'message' => 'Invalid JSON response'];
	}

	public function getLokasiById($id) {
		$url = "http://localhost:8088/lokasi/getlokasiById/" . $id;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		if (curl_errno($ch)) {
			log_message('error', 'cURL Error: ' . curl_error($ch));
			return ['status' => 'error', 'message' => 'cURL Error: ' . curl_error($ch)];
		}
		curl_close($ch);
		return json_decode($response, true) ?: ['status' => 'error', 'message' => 'Invalid JSON response'];
	}
}

?>
 