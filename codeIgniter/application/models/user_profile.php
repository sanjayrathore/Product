<?php
	/**
	* 
	*/
	class User_profile extends CI_Model
	{
		
		public function __construct() 
		{
			parent::__construct();
		}
		public function user_profile($id)
		{
			$this -> db -> select('id,name, user_type, email, username');
  			$this -> db -> from('USERS');
  			$this -> db -> where('id', $id);
  			$query = $this -> db -> get();
  			//print_r($this->db->last_query());
  			//die;
  			if($query -> num_rows() > 0)
   			{	
   				//$result=$query->result();
     			$data = $query->row();
              //  print_r($query);
               // // die;
                    $result = array(
                    			'id'  =>$data->id,
                    			'name' =>$data->name, 
                    			'user_type'=>$data->user_type,
                    			'email' => $data->email,
                    			'username'=>$data->username
                    			);
     			return  $result;
                
   			}
   			else
   			{
     			return false;
   			}
		}
	}

?>