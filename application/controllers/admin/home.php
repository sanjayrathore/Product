<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Home extends CI_Controller
	{	
		/**
		* @function : why we used this function 
		* @parametere :  
		* @parametere :
		*/

		public function __construct()
		{
		
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('session');		
		}
		//======================================================

		/**
		* @function :  we used this function for admin login page
		* @parametere : 
		* @parametere : 
		*/

		public function index()
		{
			
			$session_data = $this->session->userdata('username');
			
			if ( !empty( $session_data  )
         	{
        		
				redirect('admin/home/deshboard');
         	}
    	   	else
         	{
         		$this->load->view('admin/includes/header');
				$this->load->view('admin/home/index');
				$this->load->view('admin/includes/footer');
         		
			}
		}
		
		//======================================================

		/**
		* @function :  we used this function for desh_board page
		* @parametere :
		* @parametere : 
		*/
		
		public function deshboard()
		{
			is_user_login();
			
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/sidebar_list');
			$this->load->view('admin/home/deshboard');
			$this->load->view('admin/includes/footer');	
			
		}
		
	}	

