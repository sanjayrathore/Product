<?php
/**
* 
*/
	class User_list_sorting_model extends CI_Model
	{
		public function __construct() 
		{
			parent::__construct();
		}
            
            //==================================================

		public function user_sorting($data)
		{
			$this -> db -> select('id,name,email,is_enabled');
      		$this -> db -> from('USERS');
      		
      		if ($data == "nameASC") 
      		{
      		 	$this->db->order_by("name", "asc"); 
      		}

      		if ($data == "nameDESC") 
      		{
      			$this->db->order_by("name", "desc"); 
      		}

      		if ($data == "emailASC") 
      		{
      		 	$this->db->order_by("email", "asc"); 
      		}

      		if ($data == "emailDESC") 
      		{
      			$this->db->order_by("email", "desc"); 
      		}

        	    	$query = $this -> db -> get();
            			
                  if($query -> num_rows() > 0)
       		{	
       			$result=$query->result();
       			return  $result;
       		}
       		else
       		{
         		return false;
       		}

		}
	}
