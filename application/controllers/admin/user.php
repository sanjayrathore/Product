<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Controller
	{
		public function __construct()
		{
		
			parent::__construct();

			$this->load->model('User_model');

			
			
		}

		//======================================================

		/**
		* @function :  we used this function for forget password
		* @parametere : 
		* @parametere : 
		*/		

		public function forget_password()
		{
			$this->load->view('admin/includes/header');
			$this->load->view('admin/home/forget_password');
			$this->load->view('admin/includes/footer');
		}

		//======================================================
		
		/**
		* @function :  we used this function for forget password process
		* @parametere : 
		* @parametere : 
		*/

		public function forget_password_process()
		{
			// if (count($_post) > 0) 
			// {

				$this->form_validation->set_rules('email', 'Email', 'trim|email|required');

				if ( FALSE == $this->form_validation->run() )
				{	
					$data['errors'] = validation_errors();
				}
				else
				{
					$email = $this -> input -> post('email');
					$result = $this -> User_model -> forget_password($email);
					if (false == $result) 
					{
					
						$this->session->set_flashdata('email', 'invalide UserName address');
						redirect('admin/user/forget_password');
					}

					$from_email = "sanjay.r@cisinlabs.com"; 
         			$to_email = $this->input->post('email');
					
					
					$this->load->library('email'); 
   
  			       	$this->email->from($from_email, 'cisinlabs'); 
         			$this->email->to($to_email);
         			$this->email->subject('Reset password'); 
         			$this->email->message();

         			if($this->email->send()) 
        			{
        				$this->session->set_flashdata("email_sent","Email sent successfully."); 
         			
         			}
         			else
         			{

         				$this->session->set_flashdata("email","Error in sending Email."); 
         				$this->load->view('email_form'); 
					}
					echo $to_email;
					die;
				}
				$this->load->view('admin/includes/header');
				$this->load->view('admin/home/forget_password',$data);
				$this->load->view('admin/includes/footer');

			// }
			
		}

		//======================================================

		/**
		* @function :  we used this function for admin login process
		* @parametere : 
		* @parametere : 
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

			
					$result = $this->User_model->validate($user_name,$password);
					
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
						$session_data = $this->session->set_userdata($data);
						

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
		* @parametere :  
		* @parametere : 
		*/

		public function user_profile()
		{	
			is_user_login();

			$id = $this->session->userdata('id');
			$this->user_profile_process($id);
		
		}

		//======================================================

		/**
		* @function :  we used this function for user_profile page
		* @parametere : $user id: 
		* @parametere : 
		*/

		public function user_profile_process($id)
		{
		
				is_user_login();	
				
				$result = $this->User_model->user_profile($id);
				$data['result'] = $result;
				
				$this->load->view('admin/includes/header');
				$this->load->view('admin/includes/sidebar_list');
				$this->load->view('admin/user/user_profile',$data);
				$this->load->view('admin/includes/footer');	
			
		}

		//======================================================
		
		/**
		* @function :  we used this function for add user form
		* @parametere :  
		* @parametere : 
		*/

		public function add_user()
		{	
				
			is_user_login();

			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/sidebar_list');
			$this->load->view('admin/user/add_user');
			$this->load->view('admin/includes/footer');
					
		}

		//======================================================

		/**
		* @function :  we used this function for add userprocess 
		* @parametere :  
		* @parametere : 
		*/

		public function add_user_process()
		{
			is_user_login();	
			
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
					$result 	=  $this->User_model->add_user($user_data);
					
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
			
				$this->load->view('admin/includes/header');
				$this->load->view('admin/includes/sidebar_list');
				$this->load->view('admin/user/add_user');
				$this->load->view('admin/includes/footer');
			
			
		}

		//======================================================

		/**
		* @function :  we used this function for edit user  form
		* @parametere : $user id : 
		* @parametere : 
		*/

		public function edit_user($id)
		{
			is_user_login();
				
			$result 		=  	$this->User_model->edit_user($id);
			$data['result']	= 	$result;
			$this->load->view('admin/includes/header');	
			$this->load->view('admin/includes/sidebar_list');
			$this->load->view('admin/user/edit_user',$data);
			$this->load->view('admin/includes/footer');	
			
		}

		//======================================================

		/**
		* @function :  we used this function for edit user process 
		* @parametere :  
		* @parametere : 
		*/

		public function edit_user_process()
		{
			is_user_login();
				
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
					
					$id         = $this->input->post('id');
					$name 		= $this->input->post('name');
					$usertype 	= $this->input->post('usertype');
					$email 		= $this->input->post('email');
					$password 	= $this->input->post('password');
					$username 	= $this->input->post('username');
					
					if($password == NULL || $password == "")
					{
						$user_data 	= array(
									'id'        => $id,
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
					$result = $this->User_model->edit_process($user_data);
					
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

		//======================================================

		/**
		* @function :  we used this function for user list page
		* @parametere :  
		* @parametere : 
		*/

		public function user_list()
		{
			is_user_login();	
			
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/sidebar_list');
			$this->load->view('admin/user/user_list');	
			$this->load->view('admin/includes/footer');
			
		}

		//======================================================
		
		/**
		* @function :  we used this function for user list table
		* @parametere :  
		* @parametere : 
		*/

		public function user_table()
		{
				
				$result = $this->User_model->user_list();
				$data['results'] = $result;
				if (false == $result) 
				{
					echo "No Record Found";
					die;
				}
				echo $this->load->view('admin/user/user_table', $data, true);
				die;
		
		}


		//======================================================

		/**
		* @function :  we used this function for sorting the user list
		* @parametere :  
		* @parametere : 
		*/

		public function user_list_sorting()
		{
			$sortby = $this->input->post('sortby');
			
			$result = $this->User_model->user_sorting($sortby);
			$data['results'] = $result;
			
			$this->load->view('admin/user/user_table',$data);	
			

		}

		//======================================================

		/**
		* @function :  we used this function for search the user
		* @parametere :  
		* @parametere : 
		*/

		
		public function  search_user()
		{
			$searchby = $this->input->post('searchby');
			
			$result = $this->User_model->search_user($searchby);
			
			if (FALSE == $result) 
			{
				echo "No Record Found";


			}
			else
			{
				$data['results'] = $result;
			
				$this->load->view('admin/user/user_table',$data);
			}
		}
		//======================================================

		/**
		* @function :  we used this function for delete user
		* @parametere :  
		* @parametere : 
		*/

		public function delete_user()
		{
			
			$id = $this->input->post('id');
			
			$result = $this->User_model->delete_user($id);
			
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
		* @parametere :  
		* @parametere : 
		*/

		public function disable_user()
		{
			$id = $this->input->post('id');

			$result = $this->User_model->disable_user($id);
			echo json_encode($result);
			
		}
		
		//======================================================

		/**
		* @function :  we used this function for logout 
		* @parametere :  
		* @parametere : 
		*/

		public function logout()
		{
			
			$this->session->sess_destroy();
			redirect('admin');
		}
	}
