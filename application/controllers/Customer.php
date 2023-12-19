<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('DBCustomer');
		$this->load->model('DBInfo');
	}

	
	public function form()
	{
		$this->akses->ensureAccessAdmin();
		$data['berita'] = $this->DBInfo->getAll();
		$this->load->view('customer-form', $data);
	}

	public function edit(){

	$this->akses->ensureAccessAdmin();
	// receive all data passed from GET parameter
	$idna = $this->input->get('id');
	
	$result = $this->DBCustomer->getSpecific($idna);

	//echo var_dump($result);
	$avatar = $this->session->userdata('avatar');
	$nama = $this->session->userdata('nama_lengkap');
	
	$data['entry'] = $result;
	$data['nama_lengkap'] = $nama;
	$data['avatar'] = $avatar;

	$data['berita'] = $this->DBInfo->getAll();

	$this->load->view('customer-form-edited', $data);

	}
	
	public function update(){

	// receive all data passed
	$id = $this->input->post('id');
	$nama = $this->input->post('nama');
	$alamat = $this->input->post('alamat');
	$no_telepon = $this->input->post('no_telepon');
	
	$data = array(
		'nama' => $nama,
		'alamat' => $alamat,
		'no_telepon' => $no_telepon
	);
	
	$result = $this->DBCustomer->update($data, $id);
	
	if($result == true){
		redirect("/management-customers");
	}
	
	}
	
	public function add(){

	// receive all data passed
	$nama = $this->input->post('nama');
	$alamat = $this->input->post('alamat');
	$no_telepon = $this->input->post('no_telepon');
	
	$data = array(
		'nama' => $nama,
		'alamat' => $alamat,
		'no_telepon' => $no_telepon
	);
	
	$result = $this->DBCustomer->insert($data);
	$this->counter->updateTotal('total_customer', true);
	
	if($result == true){
		redirect("/management-customers");
	}
	
	
	}
	
	public function all(){
		$result = $this->DBCustomer->getAll();
		echo json_encode($result);
	}

	public function updateTotalLocally(){
		// this is called by client on browser nor by hidden js
		$manyTimes = $this->input->get('data');
		$ops = $this->input->get('ops');
		
		for($n = 0; $n<$manyTimes; $n++){
			if($ops == 'delete'){
				$this->counter->updateTotal('total_customer', false);
			} else {
				$this->counter->updateTotal('total_customer', true);
			}
		}
		
		redirect("/management-customers");
	}

	public function delete(){

	// receive all data specific id
	$id = $this->input->post('id');
	
	$result = $this->DBCustomer->delete($id);
	
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
	
	public function logout(){
		$this->clearAllSession();
		redirect("/login");
	}
	

}
