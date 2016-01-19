<?php

	class Disable_user_model extends CI_Model
	{
		
		public function __construct() 
		{
			parent::__construct();
		}
		public function disable_user($id)
		{
			$this -> db -> select('is_enabled');
  			$this -> db -> from('USERS');
  			$this -> db -> where('id', $id);
  			$query = $this -> db -> get();
  			$data = $query->row();
  			$status = $data->is_enabled;
  			if ($status == 1) 
  			{	
  				$is_enabled = 0;
  				$user_data = array('is_enabled' => $is_enabled,
  								);
  			}
  			else
  			{
  				$is_enabled = 1;
  				$user_data = array('is_enabled' => $is_enabled,
  								);

  			}
  			$this -> db -> where('id', $id);
			$result = $this -> db ->update('USERS',$user_data);
			if ($result == 1) 
			{
				return $is_enabled;	
			}
			else
			{
				return false;
			}
		}
	}
?>