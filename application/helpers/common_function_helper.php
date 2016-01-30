<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	if (! function_exists('is_user_login')) 
	{
		function is_user_login()
		{
			$CI =& get_instance();
			
			$session_data = $CI ->session->userdata('username');
			
			if( empty ( $session_data ) )
			{
				redirect("admin");
			}
		}	
	}

	//==========================================================

	if (! function_exists('upload_image')) 
	{
		  function upload_image($image_name)
		 {
			$CI =& get_instance();
			$image_name = $image_name;
			$CI->load->library('upload');
			
			$config['upload_path'] =UPLOAD_ROOT_PATH."/";
			$config['allowed_types'] = 'gif|jpg|png';	

			$CI->upload->initialize($config);
   				
   			if ($CI->upload->do_upload($image_name))
			{
				
				return true;
			}
			else
			{
				return false;
			}
		 }
	}

	//==========================================================

	if (! function_exists('resize_image')) 
	{
		function resize_image($image_path,$width,$height)
		{
			$CI =& get_instance();

			$config['image_library'] = 'gd2';
			$config['source_image']	= $image_path;
			$config['width']	= $width;
			$config['height']	= $height;
			
			$CI->load->library('image_lib', $config); 

			if ($CI->image_lib->resize()) 
			{
				return TRUE;
			}			
			else
			{
				return FALSE;
			}
		}
	}
?>