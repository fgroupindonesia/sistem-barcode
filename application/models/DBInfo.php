<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBInfo extends CI_Model {

    public function insert($data){

        $this->db->insert('table_info', $data);

        $hasil = true;

        return $hasil;

    }
	
	public function update($data, $id){
		$condition = array('id' => $id);
		
		// data is array
		
		$this->db->where($condition);
        $this->db->update('table_info', $data);
		
		if($this->db->affected_rows() >= 1){
			return true;
		}
		
		return false;
		
	}
	
	public function delete($id){

		$this->db->where('id', $id);
        $this->db->delete('table_info');

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
        $query = $this->db->get('table_info');

       if ($query->num_rows() > 0) {
		   // array returned
            return $query->result(); 
        } 
        
        return false;

    }
	
	public function getAll($ordered = 'ASC') {
        $this->db->from('table_info');
        $this->db->order_by('id', $ordered); 
        $query = $this->db->get();
		
		 if ($query->num_rows() > 0) {
			   // array returned
            return $query->result(); 
        } else {
            return false;
        }
		
    }


}