<?php 
class Adduser_model extends CI_Model
{
	public function __construct() 
		{
			parent::__construct();
		}
	public function add_user($user_data){
		

		$this->db->insert('USERS',$user_data);
		
		if($this->db->affected_rows()>0)
		{
			//echo "check";
			//die;
			return TRUE;
		}
		else
		{
			return FAlSE;
		}


	}
}