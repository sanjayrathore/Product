<?php
	
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
			if ( $this->session->userdata('username'))
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
			if ( ! $this->session->userdata('username'))
        	{
        		redirect('admin');
        	}
        	else
        	{
				$this->load->view('admin/includes/header');
				$this->load->view('admin/includes/sidebar_list');
				$this->load->view('admin/home/deshboard');
				$this->load->view('admin/includes/footer');	
			}
		}
		
	}	

