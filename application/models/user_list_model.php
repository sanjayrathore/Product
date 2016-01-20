<?php

    class User_list_model extends CI_Model
    {
    	public function __construct() 
    	{
    			parent::__construct();
    	}
        
        //======================================================

    	public function user_list()
    	{
			$this -> db -> select('id,name,email,is_enabled');
  			$this -> db -> from('USERS');
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
