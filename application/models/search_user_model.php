<?php
	
	class Search_user_model extends CI_Model
		{
			
			public function __construct()
			{
				parent::__construct();
			}

			//======================================================

			public function search_user($searchby)
			{
				$this -> db -> select('id,name,email,is_enabled');
				$this -> db -> from('USERS');
				$this -> db -> like('name', $searchby);
				$this -> db ->or_like('email', $searchby);
				$query = $this -> db -> get();
	            			
	            if($query -> num_rows() > 0)
	       		{	
	       			$result=$query->result();
	       		
	       			return  $result;
	       		
	       		}
	       		else
	       		{
	         		return FALSE;
	       		}
			}

		}
