<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';
// use chriskacerguis\RestServer\RestController;

class ApiDemoController extends REST_Controller
{
	public function index_get(){
		echo "I'm API Rahman";
	}
}
?>
