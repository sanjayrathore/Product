<?php

	class User extends CI_Controller
	{
		public function __construct()
		{
		
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('session');		
		}

		//======================================================

		/**
		* @function :  we used this function for admin login process
		* @parametere : $name : 
		* @parametere : s
		*/

		public function admin_login()
		{
			
			if(count($_POST) > 0)
			{

				$this->form_validation->set_rules('username', 'UserName', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				
				if ( FALSE == $this->form_validation->run() )
				{	
					$data['errors'] = validation_errors();
				}
				else
				{
					$user_name 	= $this->input->post('username');
					$password 	= $this->input->post('password');

					$this->load->model('login_model');
					$result = $this->login_model->validate($user_name,$password);
					
					if(empty($result))
					{
						$this->session->set_flashdata('username', 'invalide UserName address');
						$this->session->set_flashdata('password', 'invalide Password address');
						redirect('admin/home/index');
					}
					else
					{	
						$id = $result;
						$data  = array(
										'id'		=> $id,
										'username' 	=> $user_name,
										'password' 	=> $password
									);
						$this->session->set_userdata($data);
						

						redirect('admin/home/deshboard');
						
					}
				}
			}
			
	
				$this->load->view('admin/includes/header');
				$this->load->view('admin/home/index',$data);
				$this->load->view('admin/includes/footer');
			
			

		}

		//======================================================

		/**
		* @function :  we used this function for user  profile page
		* @parametere : $name : 
		* @parametere : s
		*/

		public function user_profile()
		{	

			if ( ! $this->session->userdata('username'))
        	{
        		redirect('admin');
        	}
        	else
        	{	
				$id = $this->session->userdata('id');
				$this->user_profile_process($id);
			}
		}

		//======================================================

		/**
		* @function :  we used this function for user_profile page
		* @parametere : $name : 
		* @parametere : s
		*/

		public function user_profile_process($id)
		{
			if ( ! $this->session->userdata('username'))
        	{
        		redirect('admin');
        	}
        	else
        	{
			
				$this->load->model('user_profile');
				$result = $this->user_profile->user_profile($id);
				$data['result'] = $result;
				
				$this->load->view('admin/includes/header');
				$this->load->view('admin/includes/sidebar_list');
				$this->load->view('admin/user/user_profile',$data);
				$this->load->view('admin/includes/footer');	
			}
		}

		//======================================================
		
		/**
		* @function :  we used this function for add user form
		* @parametere : $name : 
		* @parametere : s
		*/

		public function add_user()
		{	
			if ( ! $this->session->userdata('username'))
        	{
        		redirect('admin');
        	}
        	else
        	{
				$this->load->view('admin/includes/header');
				$this->load->view('admin/includes/sidebar_list');
				$this->load->view('admin/user/add_user');
				$this->load->view('admin/includes/footer');
			}	
		}

		//======================================================

		/**
		* @function :  we used this function for add userprocess 
		* @parametere : $name : 
		* @parametere : s
		*/

		public function add_user_process()
		{
			if ( ! $this->session->userdata('username'))
        	{
        		redirect('admin');
        	}
        	else
        	{
				if(count($_POST) > 0)
				{
					$this->form_validation->set_rules('name', 'Name', 'trim|required');
					$this->form_validation->set_rules('usertype', 'UserType', 'trim|required');
					$this->form_validation->set_rules('email', 'Email', 'trim|required');
					$this->form_validation->set_rules('password', 'Password', 'trim|required');
					$this->form_validation->set_rules('username', 'UserName', 'trim|required');
					
					if ( FALSE == $this->form_validation->run())
					{	
						$this->add_user();
					}
					else
					{	
						$this->load->model('add_user_model');

						$name 		= $this->input->post('name');
						$usertype 	= $this->input->post('usertype');
						$email 		= $this->input->post('email');
						$password 	= $this->input->post('password');
						$username 	= $this->input->post('username');
						$user_data 	= array(
					
										'name'		=> $name,
									  	'user_type'	=> $usertype,
						  				'email' 	=> $email,
						  				'password' 	=> $password,
						  				'username' 	=> $username
						  				);
						$result 	=  $this->add_user_model->add_user($user_data);
						
						if( TRUE == $result )
						{
							redirect('admin/home/deshboard');
						}
						else
						{
							redirect('admin/user/add_user');
						}
					}	
				}
				else
				{
					$this->load->view('admin/includes/header');
					$this->load->view('admin/includes/sidebar_list');
					$this->load->view('admin/user/add_user');
					$this->load->view('admin/includes/footer');
				}
			}
		}

		//======================================================

		/**
		* @function :  we used this function for edit user  form
		* @parametere : $id : 
		* @parametere : s
		*/

		public function edit_user($id)
		{
			
			if ( ! $this->session->userdata('username'))
        	{
        		redirect('admin');
        	}
        	else
        	{
				$this->load->model('edit_model');
				$result 	=  $this->edit_model->edit_user($id);
				$data['result']= $result;
				$this->load->view('admin/includes/header');	
				$this->load->view('admin/includes/sidebar_list');
				$this->load->view('admin/user/edit_user',$data);
				$this->load->view('admin/includes/footer');	
			}
		}

		//======================================================

		/**
		* @function :  we used this function for edit user process 
		* @parametere : $name : 
		* @parametere : s
		*/

		public function edit_user_process()
		{
			if ( ! $this->session->userdata('username'))
        	{
        		redirect('admin');
        	}
        	else
        	{
				if(count($_POST) > 0)
				{
					$this->form_validation->set_rules('name', 'Name', 'trim|required');
					$this->form_validation->set_rules('usertype', 'UserType', 'trim|required');
					$this->form_validation->set_rules('email', 'Email', 'trim|required');
					$this->form_validation->set_rules('password', 'Password', 'trim');
					$this->form_validation->set_rules('username', 'UserName', 'trim|required');
					
					if (FALSE == $this->form_validation->run())
					{	
						$this->add_user();
					}
					else
					{	
						$this->load->model('edit_process_model');
						$id         = $this->input->post('id');
						$name 		= $this->input->post('name');
						$usertype 	= $this->input->post('usertype');
						$email 		= $this->input->post('email');
						$password 	= $this->input->post('password');
						$username 	= $this->input->post('username');
						
						if($password == NULL || $password == "")
						{
							$user_data 	= array(
										'id'        =>$id,
										'name'		=> $name,
									  	'user_type'	=> $usertype,
						  				'email' 	=> $email,
						  				'username' 	=> $username
						  				);
						}
						else
						{
							$user_data 	= array(
										'id'        => $id,
										'name'		=> $name,
									  	'user_type'	=> $usertype,
						  				'email' 	=> $email,
						  				'password' 	=> $password,
						  				'username' 	=> $username
						  				);
						}
						$result = $this->edit_process_model->edit_process($user_data);
						
						if(TRUE == $result )
						{
							redirect('admin/user/user_profile_process/'.$id);
						}
						else
						{
							redirect('admin/user/edit_user');
						}
					}	
				}
				
				
					$this->load->view('admin/includes/header');
					$this->load->view('admin/includes/sidebar_list');	
					$this->load->view('admin/user/edit_user');
					$this->load->view('admin/includes/footer');
				
			}
		}

		//======================================================

		/**
		* @function :  we used this function for user list page
		* @parametere : $name : 
		* @parametere : s
		*/

		public function user_list()
		{
			if ( ! $this->session->userdata('username'))
        	{
        		redirect('admin');
        	}
        	else
        	{
				
				$this->load->view('admin/includes/header');
				$this->load->view('admin/includes/sidebar_list');
				$this->load->view('admin/user/user_list');	
				$this->load->view('admin/includes/footer');
			}
		}

		//======================================================
		
		/**
		* @function :  we used this function for user list table
		* @parametere : $name : 
		* @parametere : s
		*/

		public function user_table()
		{
				$this->load->model('user_list_model');
				$result = $this->user_list_model->user_list();
				$data['results'] = $result;
				echo $this->load->view('admin/user/user_table', $data, true);
				die;
				//$this->load->view('admin/includes/footer');

		}


		//======================================================

		/**
		* @function :  we used this function for sorting the user list
		* @parametere : $name : 
		* @parametere : s
		*/

		public function user_list_sorting()
		{
			$sortby = $_POST['data'];
			$this->load->model('user_list_sorting_model');
			$result = $this->user_list_sorting_model->user_sorting($sortby);
			$data['results'] = $result;
			//echo $data;
			//$this->load->view('admin/includes/header');
			//$this->load->view('admin/includes/sidebar_list');
			$this->load->view('admin/user/user_table',$data);	
			//$this->load->view('admin/includes/footer');

		}

		//======================================================

		/**
		* @function :  we used this function for delete user
		* @parametere : $name : 
		* @parametere : s
		*/

		public function delete_user()
		{
			
			$id = $_POST['id'];
			$this->load->model('delete_user_model');
			$result = $this->delete_user_model->delete_user($id);
			
			if ($result == 1) 
			{
				echo json_encode("success");
       		}
			else
			{
				echo json_encode("your record not delete"); 
			}
			
		}

		//======================================================

		/**
		* @function :  we used this function for disable user 
		* @parametere : $name : 
		* @parametere : s
		*/

		public function disable_user()
		{
			$id = $_POST['id'];

		
			 $this->load->model('disable_user_model');
			 $result = $this->disable_user_model->disable_user($id);
			 echo json_encode($result);
			
		}
		
		//======================================================

		/**
		* @function :  we used this function for logout 
		* @parametere : $name : 
		* @parametere : s
		*/

		public function logout()
		{
			
			$this->session->sess_destroy();
			redirect('admin');
		}
	}
