<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('DBUser');
		$this->load->model('DBCustomer');
		$this->load->model('DBBox');
		$this->load->model('DBInfo');
	}

	public function test(){
		//echo "x";
		
		//$this->barcode->test('9291029' , 'QRCODE');
		//$this->pdf_maker->generateFile();
		$this->load->view('barcode-scanner');
	}

	private function clearSession(){
		if(isset($_SESSION['status'])){
			unset($_SESSION['status']);	
		}
	}

	public function login(){

		$this->load->view('login');
		
	}

	public function dashboard(){

		$nama = $this->session->userdata('nama_lengkap');
		
		
		if(isset($nama)){
			$data = array('nama_lengkap' => $nama);
			
			$total_user = $this->DBUser->getTotalData();
			$total_customer = $this->DBCustomer->getTotalData();
			$total_box = $this->DBBox->getTotalData();			
			
			$dataTotalCounter = array(
			'total_user' => $total_user,
			'total_customer' => $total_customer,
			'total_box'	=> $total_box);
			
			$this->session->set_userdata($dataTotalCounter);
			
			$data['berita'] = $this->DBInfo->getAll();
			
			$data['users'] =  $this->DBUser->getAll();
			$data['customers'] =  $this->DBCustomer->getAll();
			$data['boxes'] =  $this->DBBox->getAll();
			
			//echo var_dump($data);
			
			$this->load->view('dashboard', $data);
		}else {
			$this->session->set_flashdata('status','no access');
			redirect('login');	
		}
		
	}

	public function privacy_data(){

		$this->load->view('privacy_data');

	}


}
