<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBCustomer extends CI_Model {

    public function insert($data){

        $this->db->insert('table_customer', $data);

        $hasil = true;

        return $hasil;

    }
	
	public function update($data, $id){
		$condition = array('id' => $id);
		
		// data is array
		
		$this->db->where($condition);
        $this->db->update('table_customer', $data);
		
		if($this->db->affected_rows() >= 1){
			return true;
		}
		
		return false;
		
	}
	
	public function delete($id){

		$this->db->where('id', $id);
        $this->db->delete('table_customer');

        $rowsAffected = $this->db->affected_rows(); 
		
		if($rowsAffected>=1){
			return true;
		}
		
		return false;
		
	}

	public function getSpecific($id){

        $data = array(
            'id'             => $id
        );

        // periksa apakah data ini dengan id ini ada di table?
       
        $this->db->where($data);
        $query = $this->db->get('table_customer');

       if ($query->num_rows() > 0) {
		   // array returned
            return $query->result(); 
        } 
        
        return false;

    }
	
	public function getAll() {
        $query = $this->db->get('table_customer');
		
		 if ($query->num_rows() > 0) {
			   // array returned
            return $query->result(); 
        } else {
            return false;
        }
		
    }
	
	public function getTotalData() {
        // Replace 'your_table_name' with the actual name of your database table
        $total_records = $this->db->count_all('table_customer');
        return $total_records;
    }

}