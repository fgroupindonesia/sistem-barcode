<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->model('DBUser');
		$this->load->model('DBBox');
		$this->load->model('DBCustomer');
		$this->load->model('DBInfo');
	}

	public function users(){
		
		//$n = $this->akses->isAdmin();
		//echo var_dump($n);
		$this->akses->ensureAccessAdmin();
		
		$data['berita'] = $this->DBInfo->getAll('DESC');
		$data['entries'] =  $this->DBUser->getAll();
		$this->load->view('management-users', $data);

	}

	public function box(){
		$this->akses->ensureAccessBoth();
		
		$data['berita'] = $this->DBInfo->getAll('DESC');
		$data['entries'] =  $this->DBBox->getAll();
		$this->load->view('management-boxes', $data);

	}
	
	public function info(){
		$this->akses->ensureAccessAdmin();
		
		$data['berita'] = $this->DBInfo->getAll('DESC');
		$data['entries'] =  $this->DBInfo->getAll();
		$this->load->view('management-info', $data);

	}
	
	public function customers(){
		$this->akses->ensureAccessAdmin();
		
		$data['berita'] = $this->DBInfo->getAll('DESC');
		$data['entries'] =  $this->DBCustomer->getAll();
		$this->load->view('management-customers', $data);

	}


}
