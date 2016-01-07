<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Consin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->library(array('form_validation','session'));
		$this->load->model('Log_model','',TRUE);
		
	}

	public function index(){
		$this->load->view('header');
		$data['result']=$this->Log_model->consignor_view('');

		$this->load->view('consignor',$data);
		$this->load->view('footer');
	}
	public function consignor(){
		$this->load->view('header');

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('mobile','Email','required');
		$this->form_validation->set_rules('companyname','Companyname','required');
		$this->form_validation->set_rules('companyaddr','Companyaddr','required');
		if($this->form_validation->run()==False){
			$this->load->view('form');
		}else{
			$consignorsave = array(
				'consignor_name'=> $this->input->post('name'),
				'consignor_email'=> $this->input->post('email'),
				'consignor_phone'=>$this->input->post('mobile'),
				'consignor_companyname'=> $this->input->post('companyname'),
				'consignor_address'=> $this->input->post('companyaddr'),
				'consignor_status'=>"active"
			);
			//print_r($consignorsave);exit;
			$data['consignor']=$this->Log_model->consignor_insert($consignorsave);

			//$data['consignorview']=$this->Log_model->consignor_view();
			redirect('Consin','refresh'); 
		}
		$this->load->view('footer');
	}
		public function editconsign(){
		
			$this->load->view('header');

			$data['editresult'] = $this->Log_model->get($this->uri->segment(3));
			//print_r("<pre>");
			//print_r($data['editresult']);exit;
		   	$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('mobile','Email','required');
			$this->form_validation->set_rules('companyname','Companyname','required');
			$this->form_validation->set_rules('companyaddr','Companyaddr','required');
			if($this->form_validation->run()==False){
				$this->load->view('form',$data);
			}
			else{
				$consignorsave = array(
					'consignor_name'=> $this->input->post('name'),
					'consignor_email'=> $this->input->post('email'),
					'consignor_phone'=>$this->input->post('mobile'),
					'consignor_companyname'=> $this->input->post('companyname'),
					'consignor_address'=> $this->input->post('companyaddr'),
					'consignor_status'=>"active"
				);

				 	$this->Log_model->updateconsign($consignorsave,$this->uri->segment(3));
				    redirect('Consin','refresh'); 			   					
				}
				$this->load->view('footer');
			}
		   public function delete_consign(){

		    $data['result']=$this->Log_model->deleteconsign($this->uri->segment(3));

			redirect('Consin','refresh');
    }		
		
	}
	
?>