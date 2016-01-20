<?php
	/**
	* 
	*/
	class Delete_user_model extends CI_Model
	{
		public function __construct() 
		{
				parent::__construct();
		}
		//======================================================

		public function delete_user($id)
		{
			
			$this->db->where('id', $id);
			$result = $this->db->delete('USERS'); 
			
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
