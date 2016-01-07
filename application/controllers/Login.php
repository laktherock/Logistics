<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->helper(array('form', 'url','html')); // load 'form' ,'url' and 'html' helper

		$this->load->library(array('form_validation','session')); // load 'validation' class

		$this->load->model('Entry','',TRUE);  // load Login model class

	}
	public function index(){

   		$this->form_validation->set_rules('username', 'username', 'trim|required');
    	$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
		        $this->load->view('login');
		}
		else
		{
			$email_id=$this->input->post('username');
			$password=$this->input->post('password');

			$result = $this->Entry->login($email_id,$password);

			if(!empty($result)){

				$sess_array = array(    
							'username' => $result['username'],
							'password' => $result['password'],
							);

				$this->session->set_userdata('logged_in', $sess_array);

				redirect('Consin', 'refresh'); // display success web page
				exit;
			}else{
					$data['error']='Incorrect Username or password.';
					$this->load->view('login',$data);
			} 
			
		}
	}
	
	function logout(){
		$session_data = $this->session->userdata('logged_in');
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
     }	
}