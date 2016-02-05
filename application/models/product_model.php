<?php

class product_model extends CI_Model
{
	
	public function __construct() 
	{
		parent::__construct();
	}

	//==========================================================

	public function product_list()
	{
		$this -> db -> select('id,title,description,is_enabled');
		$this -> db -> from('PRODUCT');
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

	public function disable_product($id)
	{
		$this -> db -> select('is_enabled');
		$this -> db -> from('PRODUCT');
		$this -> db -> where('id', $id);
		$query  = $this -> db -> get();
		$data   = $query->row();
		$status = $data ->is_enabled;
		
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
		$result = $this -> db ->update('PRODUCT',$user_data);
		
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

	public function delete_product($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('PRODUCT'); 
		
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

	public function read_all()
	{
		$this -> db -> select('id,title,description,is_enabled');
		$this -> db -> from('PRODUCT_CATEGORIES');
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

	public function add_product($data)
	{
		$this->db->insert('PRODUCT',$data);
		
		if($this->db->affected_rows()>0)
		{
			
			return TRUE;
		}
		else
		{
			return FAlSE;
		}
	}

	//==========================================================

	public function edit_product($id)
	{
		$this -> db -> select('id, product_categoriesid, title, price, description, image_name');
		$this -> db -> from('PRODUCT');
		$this -> db -> where('id', $id);
		$query = $this -> db -> get();
		//print_r($this->db->last_query());
		//die;
    
		if($query -> num_rows() > 0)
		{	
			
			$data = $query->row();
        
       		$result = array(
        			'id'  =>$data->id,
        			'product_categoriesid' => $data->product_categoriesid,
        			'title' =>$data->title, 
        			'price' => $data->price,
        			'description'=>$data->description,
        			'image_name' => $data->image_name
        		
        			);
			return  $result;
        
		}
		else
		{
			return false;
		}
	}

	//==========================================================

	public function edit_process_product($pro_data)
	{
		$id = $pro_data['id'];
		$this -> db -> where('id', $id);
		$result = $this -> db ->update('PRODUCT',$pro_data);
			
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