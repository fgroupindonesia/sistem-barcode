<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Box extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('DBBox');
		$this->load->model('DBInfo');
	}

	
	public function form()
	{
		$this->akses->ensureAccessBoth();
		$data['berita'] = $this->DBInfo->getAll();
		$this->load->view('box-form', $data);
	}

	public function edit(){

	$this->akses->ensureAccessBoth();
	// receive all data passed from GET parameter
	$idna = $this->input->get('id');
	
	$result = $this->DBBox->getSpecific($idna);

	//echo var_dump($result);
	$avatar = $this->session->userdata('avatar');
	$nama = $this->session->userdata('nama_lengkap');
	
	$data['entry'] = $result;
	$data['nama_lengkap'] = $nama;
	$data['avatar'] = $avatar;

	$data['berita'] = $this->DBInfo->getAll();

	$this->load->view('box-form-edited', $data);

	}
	
	public function update(){

	// receive all data passed
	$id = $this->input->post('id');
	$barcode = $this->input->post('barcode');
	$quantity_stock = $this->input->post('quantity_stock');
	
	$data = array(
		'barcode' => $barcode,
		'quantity_stock' => $quantity_stock
	);
	
	$result = $this->DBBox->update($data, $id);
	
	if($result == true){
		redirect("/management-box");
	}
	
	}
	
	public function add(){

	// receive all data passed
	// receive all data passed
	$barcode = $this->input->post('barcode');
	$quantity_stock = $this->input->post('quantity_stock');
	
	$data = array(
		'barcode' => $barcode,
		'quantity_stock' => $quantity_stock
	);
	
	$result = $this->DBBox->insert($data);
	$this->counter->updateTotal('total_box', true);
	
	if($result == true){
		redirect("/management-box");
	}
	
	
	}
	
	public function all(){
		$result = $this->DBBox->getAll();
		echo json_encode($result);
	}

	public function updateTotalLocally(){
		// this is called by client on browser nor by hidden js
		$manyTimes = $this->input->get('data');
		$ops = $this->input->get('ops');
		
		for($n = 0; $n<$manyTimes; $n++){
			if($ops == 'delete'){
				$this->counter->updateTotal('total_box', false);
			} else {
				$this->counter->updateTotal('total_box', true);
			}
		}
		
		redirect("/management-box");
	}

	public function delete(){

	// receive all data specific id
	$id = $this->input->post('id');
	
	$result = $this->DBBox->delete($id);
	
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
