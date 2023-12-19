<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBUser extends CI_Model {

    public function insert($data){

        $this->db->insert('table_user', $data);

        $hasil = true;

        return $hasil;

    }
	
	public function update($data, $id){
		$condition = array('id' => $id);
		
		// data is array
		
		$this->db->where($condition);
        $this->db->update('table_user', $data);
		
		if($this->db->affected_rows() >= 1){
			return true;
		}
		
		return false;
		
	}
	
	public function delete($id){

		$this->db->where('id', $id);
        $this->db->delete('table_user');

        $rowsAffected = $this->db->affected_rows(); 
		
		if($rowsAffected>=1){
			return true;
		}
		
		return false;
		
	}

    public function verifikasi($email, $pass){

        $data = array(
            'email'             => $email,
            'pass'              => $pass
        );

        // periksa apakah user dan pass ini ada di table user?
        $valid = false;
        $this->db->where($data);
        $query = $this->db->get('table_user');

        if($query){
            $rest = $query->result();

            foreach($rest as $row){
				
                $valid = true;
				break;
            }

        } else { 
            $valid = false;
        }
        
        return $valid;

    }

	public function getByEmail($col, $email){

        $data = array(
            'email'             => $email
        );

        // periksa apakah user dan pass ini ada di table user?
        $result = '';
        $this->db->where($data);
        $query = $this->db->get('table_user');

        if($query){
            $rest = $query->result();

            foreach($rest as $row){
				$result = $row->$col;
				
				break;
            }

        } 
        
        return $result;

    }
	
	public function getSpecific($id){

        $data = array(
            'id'             => $id
        );

        // periksa apakah user dengan id ini ada di table?
       
        $this->db->where($data);
        $query = $this->db->get('table_user');

       if ($query->num_rows() > 0) {
            return $query->result(); // Returns an array of objects representing the result set
        } 
        
        return false;

    }
	
	public function getAll() {
        $query = $this->db->get('table_user');
		
		 if ($query->num_rows() > 0) {
            return $query->result(); // Returns an array of objects representing the result set
        } else {
            return false;
        }
		
    }

	public function getTotalData() {
        // Replace 'your_table_name' with the actual name of your database table
        $total_records = $this->db->count_all('table_user');
        return $total_records;
    }

}