<?php 
	
	class Login_model extends CI_Model
	{
		
        public function __construct() 
		{
			parent::__construct();
		}
        //======================================================
        
		public function validate($user_name,$password)
		{	
			
			$this -> db -> select('id');
  			$this -> db -> from('USERS');
  			$this -> db -> where('password', $password);
  			$this -> db -> where('email', $user_name);
  		
   			$query = $this -> db -> get();
   			
   			if($query -> num_rows() > 0)
   			{
     			foreach ($query->result() as $row)
                {
                    
     			return  $row->id;
                }
   			}
   			else
   			{
     			return false;
   			}
		}
	}
