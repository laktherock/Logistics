<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Invoice extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->library(array('form_validation','session'));
		$this->load->model('Invoice_model','',TRUE);
		
	}

	public function index(){
		$this->load->view('header');
		$data['result']=$this->Invoice_model->invoice_view('');
		$this->load->view('invoice_view',$data);
		$this->load->view('footer');
	}

	public function add_item(){
		//$this->session->unset_userdata('invoice');
		if(!empty($_SESSION['invoice'])){
			unset($_SESSION['invoice']);
		}
		$this->load->view('header');
		$data['result']=$this->Invoice_model->selectbox_view('');
		$this->form_validation->set_rules('companyaddr','Price','required');

		if($this->form_validation->run()==False){

			$this->load->view('invoice',$data);

		}else{
			//print_r('<pre>');
			//print_r($_SESSION['invoice']);exit;
			$invoice_arr=array(
	     		'invoice_from'=>$_SESSION['invoice']['0']['consignorfrom'],
	     		'invoice_to'=>$_SESSION['invoice']['0']['consignorto'],
			    'comments'=>$this->input->post('companyaddr'),
			    'pod_id'=>$this->input->post('podid'),					    							    
			    'status'=>'received',
			);	
			$invoice_id=$this->Invoice_model->add_invoice($invoice_arr);
			$item_id=$this->Invoice_model->add_item($invoice_id);
			unset($_SESSION['invoice']);
			   redirect('Invoice','refresh'); 	
	//	redirect('Invoice/ajax_item','refresh');
		
		//print_r($data['result']);exit;
	
		
		}
		$this->load->view('footer');
	}

	public function edit_item_ajax(){		
		$data['editresult'] = $this->Invoice_model->invoice_view($this->input->post('invoice_id'));
		$item_result=$this->Invoice_model->get_item($this->input->post('invoice_id'));			

		//created all items in session and load ajax item call
		if(!empty($item_result)){

			foreach($item_result as $item_result_val){
					$temp_item['consignorfrom']=$data['editresult']['0']->invoice_consignorfrom;
					$temp_item['consignorto']=$data['editresult']['0']->invoice_consignorto;
					$temp_item['products']=$item_result_val->item_name;
					$temp_item['quantity']=$item_result_val->quantity;
					$temp_item['price']=$item_result_val->rate;
					$temp_item['per']=$item_result_val->per;
					$temp_item['discount']=$item_result_val->discount;
					$temp_item['amount']=$item_result_val->amount;
					$all_itmes[]=$temp_item;
			}

			$_SESSION['invoice']=$all_itmes;
			$data['session']=1;
			$this->load->view('ajaxinvoice',$data);				
		}
			
	}	

	public function editinvoice(){
		
			$this->load->view('header');

			$data['editresult'] = $this->Invoice_model->invoice_view($this->uri->segment(3));
			$data['result']=$this->Invoice_model->ajax_select('');
		   	$this->load->view('invoice',$data);
			$this->load->view('footer');
	}

	public function deleteinvoice(){

		    $data['result']=$this->Invoice_model->deleteinvoice($this->uri->segment(3));

			redirect('Invoice','refresh');
    }		
	public function ajax_select(){

		$id=$this->input->post('cid');
		//print_r($id);
		$data['con_result']=$this->Invoice_model->ajax_select($id);
		//print_r($data['result']);
		$this->load->view('ajaxinvoice',$data);

	}
	public function ajax_item(){
			if(!empty($this->input->post('discount'))){
			$amt=$this->input->post('quantity')*$this->input->post('price');
			$discount=$amt*$this->input->post('discount')/100;
			$amount=$amt-$discount;
			$dis=$this->input->post('discount');
		}else{
			$dis=0;
			$amount=$this->input->post('quantity')*$this->input->post('price');
		}	
		
		$_SESSION['invoice'][]=array(

		'consignorfrom'=>$this->input->post('con_from'),
		'consignorto'=>$this->input->post('consid'),
		'products'=>$this->input->post('products'),
		'quantity'=>$this->input->post('quantity'),
		'price'=>$this->input->post('price'),
		'per'=>$this->input->post('per'),
		'discount'=>$dis,
		'amount'=>$amount,
		);
		//print_r($_SESSION['invoice']);
		//$_SESSION['invoice'][]=$data;
		$data['session']=1;
		$this->load->view('ajaxinvoice',$data);

	}



}
?>	
