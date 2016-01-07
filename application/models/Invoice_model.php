<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function selectbox_view(){

		$this->db->select('consignor_id,consignor_name');
		$this->db->from('consignor');
		$query=$this->db->get('');
		return $query->result();
	}
	public function ajax_select($id){

		$this->db->select('*');
		$this->db->from('consignor');
		$this->db->where('consignor_name !=',$id);
		$query=$this->db->get();
		return $query->result();
	}

	public function get_item($invoice_id){

		$this->db->select('*');
		$this->db->from('item');
		$this->db->where('invoice_id',$invoice_id);
		$query=$this->db->get();
		//echo $this->db->last_query();
		//exit;
		return $query->result();
	}

	public function add_invoice($invoice_arr){
		$invoice= array();
			if(!empty($invoice_arr['invoice_from'])){
				$invoice['invoice_consignorfrom']=$invoice_arr['invoice_from'];
			}
			if(!empty($invoice_arr['invoice_to'])){
				$invoice['invoice_consignorto']=$invoice_arr['invoice_to'];
			}
			if(!empty($invoice_arr['comments'])){
				$invoice['invoice_comments']=$invoice_arr['comments'];
			}
			if(!empty($invoice_arr['pod_id'])){
				$invoice['invoice_podid']=$invoice_arr['pod_id'];
			}
			if(!empty($invoice_arr['status'])){
				$invoice['invoice_status']=$invoice_arr['status'];
			}
			//print_r("<pre>");
			//print_r($invoice);exit;
			$this->db->set('invoice_createddate', 'NOW()', FALSE);
			$this->db->insert('invoice',$invoice);
			$invoice_id=$this->db->insert_id();
			return $invoice_id;
	}
	public function add_item($invoice_id){
		$item= array();
		//print_r($_SESSION['invoice']);exit;
		foreach ($_SESSION['invoice'] as $val) {
			if(!empty($invoice_id)){
				$item['invoice_id']=$invoice_id;
			}
			if(!empty($val['products'])){
				$item['item_name']=$val['products'];
			}
			if(!empty($val['quantity'])){
				$item['quantity']=$val['quantity'];
			}
			if(!empty($val['price'])){
				$item['rate']=$val['price'];
			}
			if(!empty($val['per'])){
				$item['per']=$val['per'];
			}
			if(!empty($val['discount'])){
				$item['discount']=$val['discount'];
			}
			if(!empty($val['amount'])){
				$item['amount']=$val['amount'];
			}
			//print_r("<pre>");
			//print_r($item);exit;
			$this->db->set('item_createddate','NOW()', FALSE);
			$this->db->insert('item',$item);

			$item_id=$this->db->insert_id();
		}
			return $item_id;
	}
	public function invoice_view(){
		$this->db->select('*');
		$this->db->from('invoice');
		$query=$this->db->get();
		return $query->result();
	}
			public function updateinvoice($invoice_arr,$invoice_id){
	
			$inv= array();
			if(!empty($invoice_arr['invoice_from'])){
				$inv['invoice_consignorfrom']=$invoice_arr['invoice_from'];
			}
			if(!empty($invoice_arr['invoice_to'])){
				$inv['invoice_consignorto']=$invoice_arr['invoice_to'];
			}
			if(!empty($invoice_arr['comments'])){
				$inv['invoice_comments']=$invoice_arr['comments'];
			}
			if(!empty($invoice_arr['pod_id'])){
				$inv['invoice_podid']=$invoice_arr['pod_id'];
			}
			if(!empty($invoice_arr['status'])){
				$inv['invoice_status']=$invoice_arr['status'];
			}
			//print_r("<pre>");
			//print_r($consig);exit;
		$this->db->set('invoice_createddate', 'NOW()', FALSE);
		$this->db->where('invoice_id',$invoice_id);	
		$this->db->update('invoice',$inv);
	}	
	public function deleteinvoice($invoice_id){
		
		$this->db->set('invoice_status','deleted');
		$this->db->where('invoice_id',$invoice_id);
		$this->db->update('invoice');
	}	

}
?>