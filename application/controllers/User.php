<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('DBUser');
		$this->load->model('DBInfo');
	}

	
	public function form()
	{
		$this->akses->ensureAccessAdmin();
		$data['berita'] = $this->DBInfo->getAll();
		$this->load->view('user-form', $data);
	}
	
	public function settings(){

	// receive all data passed from GET parameter
	$idna = $this->session->userdata('id');
	
	$result = $this->DBUser->getSpecific($idna);
	
	$data['entry'] = $result;
	$data['berita'] = $this->DBInfo->getAll();
	
	$this->load->view('settings-form-edited', $data);

	}

	public function edit(){

	$this->akses->ensureAccessAdmin();
	// receive all data passed from GET parameter
	$idna = $this->input->get('id');
	
	$result = $this->DBUser->getSpecific($idna);

	//echo var_dump($result);
	$avatar = $this->session->userdata('avatar');
	$nama = $this->session->userdata('nama_lengkap');
	
	$data['entry'] = $result;
	$data['nama_lengkap'] = $nama;
	$data['avatar'] = $avatar;

	$data['berita'] = $this->DBInfo->getAll();

	$this->load->view('user-form-edited', $data);

	}
	
	public function updateSettings(){
		// receive all data passed
	$id = $this->input->post('id');
	$nama_lengkap = $this->input->post('nama_lengkap');
	$username = $this->input->post('username');
	$no_telepon = $this->input->post('no_telepon');
	$email = $this->input->post('email');
	$pass = $this->input->post('pass');
	$user_type = $this->input->post('user_type');
	
	$data = array(
		'nama_lengkap' => $nama_lengkap,
		'username' => $username,
		'no_telepon' => $no_telepon,
		'email'	=> $email,
		'pass' => $pass,
		'user_type' => $user_type
	);
	
	$namaBaru = array('nama_lengkap' => $nama_lengkap);
	
	$this->session->set_userdata($namaBaru);
		
	
	$result = $this->DBUser->update($data, $id);
	
		if($result == true){
			redirect("/dashboard");
		}
	}
	
	public function update(){

	// receive all data passed
	$id = $this->input->post('id');
	$nama_lengkap = $this->input->post('nama_lengkap');
	$username = $this->input->post('username');
	$no_telepon = $this->input->post('no_telepon');
	$email = $this->input->post('email');
	$pass = $this->input->post('pass');
	$user_type = $this->input->post('user_type');
	
	$data = array(
		'nama_lengkap' => $nama_lengkap,
		'username' => $username,
		'no_telepon' => $no_telepon,
		'email'	=> $email,
		'pass' => $pass,
		'user_type' => $user_type
	);
	
	$result = $this->DBUser->update($data, $id);
	
		if($result == true){
			redirect("/management-users");
		}
	
	}
	
	public function register(){

	// receive all data passed
	$nama_lengkap = $this->input->post('nama_lengkap');
	
	$email = $this->input->post('email');
	$pass = $this->input->post('pass');
	
	$username = explode('@', $email)[0];
	$user_type = 'staff';
	
	$data = array(
		'nama_lengkap' => $nama_lengkap,
		'username' => $username,
		'no_telepon' => 0,
		'email'	=> $email,
		'pass' => $pass,
		'user_type' => $user_type
	);
	
	$result = $this->DBUser->insert($data);
	
		$this->session->set_flashdata('status','register success');
	
		if($result == true){
			redirect("/login");
		}
	
	
	}
	
	
	public function add(){

	// receive all data passed
	// receive all data passed
	$nama_lengkap = $this->input->post('nama_lengkap');
	$username = $this->input->post('username');
	$no_telepon = $this->input->post('no_telepon');
	$email = $this->input->post('email');
	$pass = $this->input->post('pass');
	$user_type = $this->input->post('user_type');
	
	$data = array(
		'nama_lengkap' => $nama_lengkap,
		'username' => $username,
		'no_telepon' => $no_telepon,
		'email'	=> $email,
		'pass' => $pass,
		'user_type' => $user_type
	);
	
	$result = $this->DBUser->insert($data);
	$this->counter->updateTotal('total_user', true);
	
		if($result == true){
			redirect("/management-users");
		}
	
	
	}
	
	public function all(){
		$result = $this->DBUser->getAll();
		echo json_encode($result);
	}

	public function updateTotalLocally(){
		// this is called by client on browser nor by hidden js
		$manyTimes = $this->input->get('data');
		$ops = $this->input->get('ops');
		
		for($n = 0; $n<$manyTimes; $n++){
			if($ops == 'delete'){
				$this->counter->updateTotal('total_user', false);
			} else {
				$this->counter->updateTotal('total_user', true);
			}
		}
		
		redirect("/management-users");
	}

	public function delete(){

	// receive all data specific id
	$id = $this->input->post('id');
	
	$result = $this->DBUser->delete($id);
	
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
	
	public function login(){

	// verify this user
	$email = $this->input->post('email');
	$pass = $this->input->post('pass');
	
	$result = $this->DBUser->verifikasi($email, $pass); 
	
	//echo var_dump($result);
	
	if($result){
		$id = $this->DBUser->getByEmail('id', $email);
		
		//$nama = $this->DBUser->getByEmail('nama_lengkap', $email);
		//$avatar = $this->DBUser->getByEmail('avatar', $email);
		
		$dataNa =  $this->DBUser->getSpecific($id);
		
		//echo var_dump($dataNa);
		//$dataNa = array('id' => $id, 'nama_lengkap' => $nama, 'avatar' => $avatar);
		$dataEntry = (array)$dataNa[0];
		
		$this->clearErrorSession();
		$this->session->set_userdata($dataEntry);
		
		redirect("/dashboard");
	}else{
		$this->session->set_flashdata('status','error');
		redirect("login");
	}
	
	
	}

}
