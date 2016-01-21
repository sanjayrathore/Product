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
?>