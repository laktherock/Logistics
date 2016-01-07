<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	class Log_model extends CI_Model{
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }
	    public function consignor_insert($consignorsave){
			$consig= array();
			if(!empty($consignorsave['consignor_name'])){
				$consig['consignor_name']=$consignorsave['consignor_name'];
			}
			if(!empty($consignorsave['consignor_email'])){
				$consig['consignor_email']=$consignorsave['consignor_email'];
			}
			if(!empty($consignorsave['consignor_phone'])){
				$consig['consignor_phone']=$consignorsave['consignor_phone'];
			}
			if(!empty($consignorsave['consignor_companyname'])){
				$consig['consignor_companyname']=$consignorsave['consignor_companyname'];
			}
			if(!empty($consignorsave['consignor_address'])){
				$consig['consignor_address']=$consignorsave['consignor_address'];
			}
			if(!empty($consignorsave['consignor_status'])){
				$consig['consignor_status']=$consignorsave['consignor_status'];
			}
			//print_r("<pre>");
			//print_r($consig);exit;
			$this->db->set('consignor_createddate', 'NOW()', FALSE);
			$this->db->insert('consignor',$consig);
			//$cons_id=$this->db->insert_id();
			//return $cons_id;
		}
		public function consignor_view(){
			$this->db->select('*');
			$this->db->from('consignor');

			$query = $this->db->get();
			return $query->result();
		}
		public function get($consignor_id){

		$this->db->select('*');
		$this->db->from('consignor');
		if(!empty($consignor_id)){
			$this->db->where('consignor_id',$consignor_id);
		}
		$this->db->where('consignor_status','active');
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result();
	}
		public function updateconsign($consignorsave,$consignor_id){
	
			$consig= array();
			if(!empty($consignorsave['consignor_name'])){
				$consig['consignor_name']=$consignorsave['consignor_name'];
			}
			if(!empty($consignorsave['consignor_email'])){
				$consig['consignor_email']=$consignorsave['consignor_email'];
			}
			if(!empty($consignorsave['consignor_phone'])){
				$consig['consignor_phone']=$consignorsave['consignor_phone'];
			}
			if(!empty($consignorsave['consignor_companyname'])){
				$consig['consignor_companyname']=$consignorsave['consignor_companyname'];
			}
			if(!empty($consignorsave['consignor_address'])){
				$consig['consignor_address']=$consignorsave['consignor_address'];
			}
			if(!empty($consignorsave['consignor_status'])){
				$consig['consignor_status']=$consignorsave['consignor_status'];
			}//print_r("<pre>");
			//print_r($consig);exit;
		$this->db->set('consignor_createddate', 'NOW()', FALSE);
		$this->db->where('consignor_id',$consignor_id);	
		$this->db->update('consignor',$consig);
	}	
	public function deleteconsign($consignor_id){
		
		$this->db->set('consignor_status','deleted');
		$this->db->where('consignor_id',$consignor_id);
		$this->db->update('consignor');
	}	
	
}    
?>	