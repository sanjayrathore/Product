<?php
/**
* 
*/
class Edit_process_model extends CI_Model
	{
		
		public function __construct() 
		{
			parent::__construct();
		}
		public function edit_process($user_data)
		{

				$id = $user_data['id'];
				$this -> db -> where('id', $id);
				$result = $this -> db ->update('USERS',$user_data);
	  			
				if ($result == 1) 
				{
					return TRUE;	
				}
				else
				{
					return FALSE;
				}
		}
	}