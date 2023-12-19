<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses {
	
	 protected $CI;

    public function __construct() {
        $this->CI =& get_instance(); // Get the CI super object
    }

	public function ensureAccessAdmin(){
			if(!$this->isAdmin()){
				redirect('/login');
			}
		}
		
	public function ensureAccessBoth(){
			if(!$this->isAdmin() && !$this->isStaff()){
				redirect('/login');
			}
		}

   public function isAdmin(){
		//$total_now =  $this->session->userdata('total_user');
		$user_type =  $this->CI->session->userdata('user_type');
		
		if($user_type == 'admin'){
		return true;
		}
		
		return false;
		
	}
	
	public function isStaff(){
		//$total_now =  $this->session->userdata('total_user');
		$user_type =  $this->CI->session->userdata('user_type');
		
		if($user_type == 'staff'){
		return true;
		}
		
		return false;
		
	}
   
   
}

?>