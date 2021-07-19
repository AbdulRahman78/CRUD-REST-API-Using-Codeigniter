<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeModel extends CI_Model{
	public function get_employee(){
		$query = $this->db->get('employee');
		return $query->result_array();
	}

	public function insert_employee($data){
		
		return $this->db->insert('employee',$data);
	}
	public function getvaluebyid_employee($id){
		$this->db->where('id',$id);
		$query = $this->db->get('employee');
		return $query->row();
	}
	public function update_employee($id, $data){
		$this->db->where('id',$id);
		return $this->db->update('employee',$data); 
	}
	public function delete_employee($id){
		return $this->db->delete('employee',['id'=>$id]); 
	}
}
?>