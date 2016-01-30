<?php
/**
* 
*/
	class Product_categories extends CI_Controller
	{
		
		public function __construct()
		{
		
			parent::__construct();
			$this->load->model('Product_categories_model');

		}

		//======================================================
		/**
		* @function :  we used this function for product categories list page
		* @parametere :  
		* @parametere : 
		*/

		public function product_categories_list()
		{
			is_user_login();
			
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/sidebar_list');
			$this->load->view('admin/product_categories/product_categories_list');
			$this->load->view('admin/includes/footer');	
		}

		//======================================================
		
		/**
		* @function :  we used this function for product categories list table
		* @parametere :  
		* @parametere : 
		*/

		public function product_categories_table()
		{
				$result = $this->Product_categories_model->product_categories_list();
				
				$data['results'] = $result;
				 
				if (false == $result) 
				{
				 	echo "NO Record Found";
				 	die;
				}
				echo $this->load->view('admin/product_categories/product_categories_table', $data, true);
				die;
		}

		//======================================================
		
		/**
		* @function :  we used this function for delete product categories
		* @parametere :  
		* @parametere : 
		*/		

		public function delete_pro_categories()
		{
			$id = $this->input->post('id');
			
			$result = $this->Product_categories_model->delete_pro_categories($id);
			
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
		* @function :  we used this function for disable product categories
		* @parametere :  
		* @parametere : 
		*/		

		public function disable_pro_categories()
		{
			$id = $this->input->post('id');

			$result = $this->Product_categories_model->disable_pro_categories($id);
			echo json_encode($result);
		}

		//======================================================
		
		/**
		* @function :  we used this function for add product categories
		* @parametere :  
		* @parametere : 
		*/	
		public function add_pro_categories()
		{
			

			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/sidebar_list');
			$this->load->view('admin/product_categories/add_product_categories');
			$this->load->view('admin/includes/footer');
		}	

		//======================================================

		/**
		* @function :  we used this function for upload  image of product categories
		* @parametere :  
		* @parametere : 
		*/	

		public function do_upload()
		{
			$data['errors'] = "";
			if (count($_POST)>0) 
			{
				$this->form_validation->set_rules('title', 'Title', 'trim|required');
				$this->form_validation->set_rules('description', 'Description', 'trim|required');
				$this->form_validation->set_rules('imagefile','ImageFile','callback_handle_upload');
				
				if ( FALSE == $this->form_validation->run() )
				{	
					$data['errors'] = validation_errors();
				}
				else
				{
					$title = $this -> input ->post('title');
					$description = $this -> input -> post('description'); 
					$image_name = "imagefile";
					
					$upload = upload_image($image_name);

					if (false == $upload) 
					{
						redirect('admin/product_categories/add_pro_categories');
					}
					
					$upload_data = $this->upload->data(); 
					$file_name =   $upload_data['file_name'];
					
					$image_path = UPLOAD_ROOT_PATH."/".$file_name;
					$width = 60;
					$height = 50;
					
					$resize = $this->resize_image($image_path,$width,$height);
					
					if (TRUE == $resize) 
					{
						
						$data  = array(
										'title' => $title,
										'description' => $description,
										'image_name' => $file_name 
									);
						$result = $this->Product_categories_model->add_pro_categories($data);
						
						if (TRUE == $result) 
						{
							//echo $result;
							redirect('admin/home/deshboard');
						}
						else
						{
							redirect('admin/product_categories/add_pro_categories');
						}
					}

					
				}
					
			}
				
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/sidebar_list');
			$this->load->view('admin/product_categories/add_product_categories',$data);
			$this->load->view('admin/includes/footer');
			
		}	

		//======================================================

		/**
		* @function :  we used this function for upload  image validation 
		* @parametere :  
		* @parametere : 
		*/

		public function handle_upload()
		{
			
			
			if (isset($_FILES['imagefile'])&& !empty($_FILES['imagefile']['name'])) 
			{
				
				return true;	
			}
			else
			{
				$this->form_validation->set_message('handle_upload', "You must upload an image!");
      			return false;
			}
		}

		//======================================================

		/**
		* @function :  we used this function for edit the product categories 
		* @parametere :$id  means the product catrgories id  
		* @parametere : 
		*/

		public function edit_pro_categories($id)
		{
			$result = $this->Product_categories_model->edit_pro_categories($id);
			$data['result']	= 	$result;

			$this->load->view('admin/includes/header');	
			$this->load->view('admin/includes/sidebar_list');

			$this->load->view('admin/product_categories/edit_product_categories',$data);
			$this->load->view('admin/includes/footer');	
		}

		//======================================================

		/**
		* @function :  we used this function for edit product categories 
		* @parametere :  
		* @parametere : 
		*/

		public function edit_process_pro__categories()
		{
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');

			if ( FALSE == $this->form_validation->run() )
			{	
				$data['errors'] = validation_errors();
				$id             = $this -> input -> post('id');
				redirect('admin/product_categories/edit_pro_categories/'.$id);
			}
			else
			{	
				$id             = $this -> input -> post('id');
				$title 			= $this	-> input -> post('title');
				$description 	= $this -> input -> post ('description');
				$file_name 		= $this	-> input -> post('image_name'); 
				if (empty($_FILES['editimagefile']['name'])&& $_FILES['imagefile']['name'] == "") 
				{
					
					
					$pro_data  	= array(
										'id'			=> $id,
										'title' 		=> $title,
										'description' 	=> $description,
										'image_name'    => $file_name
									);
				}
				else
				{
					$image_name = "editimagefile";
					$upload =  upload_image($image_name);
					
					if (false == $upload) 
					{
						redirect('admin/product_categories/edit_pro_categories/'.$id);
					}
						
					unlink(UPLOAD_ROOT_PATH."/".$file_name);
					
					$upload_data = $this->upload->data(); 
					$file_name =   $upload_data['file_name'];
					
					$image_path = UPLOAD_ROOT_PATH."/".$file_name;
					$width = 60;
					$height = 50;
					
					$resize = $this->resize_image($image_path,$width,$height);
					
					if (TRUE == $resize) 
					{

						
						$pro_data  	= array(
											'id'	=>$id,
											'title' => $title,
											'description' => $description,
											'image_name' => $file_name 
										);
					}

				}
				
				$result = $this->Product_categories_model->edit_process_pro_categories($pro_data);
				if (TRUE == $result) 
				{
					redirect('admin/product_categories/product_categories_list');
				}
				else
				{
					redirect('admin/product_categories/edit_pro_categories/'.$id);
				}
			}
		}
	}