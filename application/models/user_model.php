<?php

class User_model extends CI_Model
{
	
	public function __construct() 
	{
		parent::__construct();
	}
	//======================================================
	
	public function forget_password($email)
	{
		$this -> db -> select('id,email');
		$this -> db -> from('USERS');
		$this -> db -> where('email', $email);
		$query = $this -> db -> get();
		//print_r($this->db->last_query());
		//die;
		if($query -> num_rows() > 0)
		{	
			//$result=$query->result();
			$data = $query->row();
      
            $result = array(
            			'id'  =>$data->id,
            			'email' => $data->email
            			);
			return  $result;
        
		}
		else
		{
			return false;
		}
	}

	//==========================================================

	public function check_unique_code($id, $password)
	{
		$this -> db -> select('id');
		$this -> db -> from('USERS');
		$this -> db -> where('id', $id);
		$this -> db -> where('password', $password);
	
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
	//==========================================================

	public function validate($user_name,$password)
	{
			//die("asga");
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
	//==========================================================

	public function user_list()
    {
			
		$this -> db -> select('id,name,email,is_enabled');
		$this -> db -> from('USERS');
		$query = $this -> db -> get();
  			
        if($query -> num_rows() > 0)
		{	
			// foreach ($query->result() as $row) {
   //              $data[] = $row;
   //          }
   //          return $data;
			$result=$query->result();
			return  $result;
		}
		else
		{
			return false;
			//$this->db->count_all("USERS");
		}
	}

	//==========================================================

	 public function fetch_data($limit) 
	 {
		$this -> db -> select('id,name,email,is_enabled');
		$this -> db -> from('USERS');
		$query = $this -> db -> get();
  			
        if($query -> num_rows() > 0)
		{	
			// foreach ($query->result() as $row) {
   //              $data[] = $row;
   //          }
   //          return $data;
			$result=$query->result();
			return  $result;
		}
		else
		{
			return false;
			//$this->db->count_all("USERS");
		}
	// 	$this->db->limit($limit);
	// 	$this->db->where('id', $id);
	// 	$query = $this->db->get("USERS");
	// 	if ($query->num_rows() > 0)
	// 	 {
	// 		// foreach ($query->result() as $row) 
	// 		// {
	// 		// 	$data[] = $row;
	// 		// }

	// 		return $data;
	// 	}
	// 	return false;
	 }
	//==========================================================

	public function add_user($user_data)
	{
			

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
	//==========================================================

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
	//==========================================================

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
	//==========================================================

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
	//==========================================================

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
	//==========================================================

	public function edit_user($id)
	{
		
		$this -> db -> select('id,name, user_type, email, username');
		$this -> db -> from('USERS');
		$this -> db -> where('id', $id);
		$query = $this -> db -> get();
		//print_r($this->db->last_query());
		//die;
    
		if($query -> num_rows() > 0)
		{	
			
			$data = $query->row();
        
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
	//==========================================================

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
	//==========================================================

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