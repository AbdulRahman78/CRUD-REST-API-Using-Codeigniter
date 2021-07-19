<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';
// use chriskacerguis\RestServer\RestController;

class Employee extends REST_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('EmployeeModel');
	}
	public function index_get(){

		$employee = new EmployeeModel;
		$result = $employee->get_employee();
		// print_r($result);exit();
		// $this->response($result,200);
		$this->response($result);
	}

	public function index_post(){
		$employee = new EmployeeModel;
		$data = [
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
		];
		$result = $employee->insert_employee($data);
		// $this->response($data,200);
		if($result > 0){
			$this->response([
				'status' => true,
				'message' => 'New Employee has been added',	
			],Rest_Controller::HTTP_OK);
		}
		else{
			$this->response([
				'status' => true,
				'message' => 'Failed to add New Employee has been added'
			],Rest_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function getvaluebyid_get($id){
		$employee = new EmployeeModel;
		$result = $employee->getvaluebyid_employee($id); 
		$this->response($result); 
	}
	public function updatevalue_put($id){
		$employee = new EmployeeModel;
		$data = [
			'first_name' => $this->put('first_name'),
			'last_name' => $this->put('last_name'),
			'phone' => $this->put('phone'),
			'email' => $this->put('email'),
		];
		// print_r($data);exit();
		$update_result = $employee->update_employee($id, $data);
		// $this->response($data,200);
		if($update_result > 0){
			$this->response([
				'status' => true,
				'message' => 'Updated',	
			],Rest_Controller::HTTP_OK);
		}
		else{
			$this->response([
				'status' => true,
				'message' => 'Failed to update'
			],Rest_Controller::HTTP_BAD_REQUEST);
		}
	}
	public function deletevalue_delete($id){
		$employee = new EmployeeModel;
		$result = $employee->delete_employee($id);
		if($result > 0){
			$this->response([
				'status' => true,
				'message' => 'Deleted',	
			],Rest_Controller::HTTP_OK);
		}
		else{
			$this->response([
				'status' => true,
				'message' => 'Failed to delete'
			],Rest_Controller::HTTP_BAD_REQUEST);
		}
	}
}
?>
