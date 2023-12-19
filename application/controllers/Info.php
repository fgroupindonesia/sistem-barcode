<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('DBInfo');
	}

	
	public function form()
	{
		$this->akses->ensureAccessAdmin();
		$data['berita'] = $this->DBInfo->getAll();
		$this->load->view('info-form', $data);
	}

	public function edit(){

	$this->akses->ensureAccessAdmin();
	// receive all data passed from GET parameter
	$idna = $this->input->get('id');
	
	$result = $this->DBInfo->getSpecific($idna);

	//echo var_dump($result);
	$avatar = $this->session->userdata('avatar');
	$nama = $this->session->userdata('nama_lengkap');
	
	//echo var_dump($result);
	
	$result[0]->ended_date = $this->konvertIntoIndonesianDate($result[0]->ended_date);
	$result[0]->started_date = $this->konvertIntoIndonesianDate($result[0]->started_date);
	
	$data['entry'] = $result;
	$data['nama_lengkap'] = $nama;
	$data['avatar'] = $avatar;

	$data['berita'] = $this->DBInfo->getAll();

	$this->load->view('info-form-edited', $data);

	}
	
	public function update(){

	// receive all data passed
	$id = $this->input->post('id');
	$berita = $this->input->post('berita');
	$started_date = $this->input->post('started_date');
	$ended_date = $this->input->post('ended_date');
	
	$sdate = $this->konvertIntoMySQLDate($started_date);
	$edate = $this->konvertIntoMySQLDate($ended_date);
	
	$data = array(
		'berita' => $berita,
		'started_date' => $sdate,
		'ended_date' => $edate
	);
	
	$result = $this->DBInfo->update($data, $id);
	
		if($result == true){
			redirect("/management-info");
		}
	
	}
	
	private function konvertIntoIndonesianDate($mySQLDate){
		return $this->konvertIntoMySQLDate($mySQLDate);
	}
	
	private function konvertIntoMySQLDate($indonesianDate){
		$res = explode("-", $indonesianDate);
		// indonesian format (dd-mm-yyyy)
		$newDate = $res[2] . "-" . $res[1] . "-" . $res[0];
		return $newDate;
	}
	
	public function add(){

	// receive all data passed
	$berita = $this->input->post('berita');
	$started_date = $this->input->post('started_date');
	$ended_date = $this->input->post('ended_date');
	
	// since the data is indonesian format (dd-mm-yyyy)
	// so we need to make it compatible with mysql format (yyyy-mm-dd)
	$sdate = $this->konvertIntoMySQLDate($started_date);
	$edate = $this->konvertIntoMySQLDate($ended_date);
	
	$data = array(
		'berita' => $berita,
		'started_date' => $sdate,
		'ended_date' => $edate
	);
	
	$result = $this->DBInfo->insert($data);
	
	if($result == true){
		redirect("/management-info");
	}
	
	
	}
	
	public function all(){
		$result = $this->DBInfo->getAll();
		echo json_encode($result);
	}

	public function updateTotalLocally(){
		// this is called by client on browser nor by hidden js
		$manyTimes = $this->input->get('data');
		$ops = $this->input->get('ops');
		
		for($n = 0; $n<$manyTimes; $n++){
			if($ops == 'delete'){
				$this->counter->updateTotal('total_info', false);
			} else {
				$this->counter->updateTotal('total_info', true);
			}
		}
		
		redirect("/management-info");
	}

	public function delete(){

	// receive all data specific id
	$id = $this->input->post('id');
	
	$result = $this->DBInfo->delete($id);
	
	// testing : echo var_dump($result);
	echo $result;
	
	}
	
	private function clearErrorSession(){
		if(isset($_SESSION['status'])){
			unset($_SESSION['status']);	
		}
	}
	
	private function clearAllSession(){
		$this->session->sess_destroy();
	}
	
}
