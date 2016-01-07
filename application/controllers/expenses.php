<?php
defined('BASEPATH') or exit('No direct access script is allowed');

class Expenses extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
		//$this->load->model('Expenses_model',"",TRUE);
	}
	public function index(){
		$this->load->view('header');
		$this->load->view('expenses');
		$this->load->view('footer');

	}
}
?>