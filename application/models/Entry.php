<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entry extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function login($username,$password){

		if(($username == "admin")&&($password == "admin")){

			$arr=array(	'username' => $username,
						'password' => $password,
						);
		     return $arr;
		}
		else{
		     return false;
		}
    }
}

?>