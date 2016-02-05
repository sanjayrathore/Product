<?php
/**
* 
*/
	class Product extends CI_Controller
	{
		
		public function __construct()
		{
		
			parent::__construct();
			$this->load->model('Product_model');

		}

		//======================================================
		
		/**
		* @function :  we used this function for product list page
		* @parametere :  
		* @parametere : 
		*/

		public function product_list()
		{
			is_user_login();
			
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/sidebar_list');
			$this->load->view('admin/product/product_list');
			$this->load->view('admin/includes/footer');	
		}

		//======================================================
		
		/**
		* @function :  we used this function for product list table
		* @parametere :  
		* @parametere : 
		*/

		public function product_table()
		{ 		

				$result = $this->Product_model->product_list();
				
				$data['results'] = $result;
				 
				if (false == $result) 
				{
				 	echo "NO Record Found";
				 	die;
				}
				echo $this->load->view('admin/product/product_table', $data, true);
				die;
		}


		//======================================================
		
		/**
		* @function :  we used this function for product disable record
		* @parametere :  
		* @parametere : 
		*/

		public function disable_product()
		{
			$id = $this->input->post('id');

			$result = $this->Product_model->disable_product($id);
			echo json_encode($result);
		}

		//======================================================

		/**
		* @function :  we used this function for product delete record
		* @parametere :  
		* @parametere : 
		*/

		public function delete_product()
		{
			$id = $this->input->post('id');
			
			$result = $this->Product_model->delete_product($id);
			
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
		* @function :  we used this function for add product 
		* @parametere :  
		* @parametere : 
		*/	
		
		public function add_product()
		{
			is_user_login();

			$result = $this->Product_model->read_all();
			$data['results'] = $result;
			// echo "string";
			// die;
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/sidebar_list');
			$this->load->view('admin/product/add_product', $data);
			$this->load->view('admin/includes/footer');
		}

		//======================================================

		public function do_upload()
		{
			$data['errors'] = "";
			if (count($_POST)>0) 
			{
				$this->form_validation->set_rules('title', 'Title', 'trim|required');
				$this->form_validation->set_rules('price', 'Price', 'trim|required');
				$this->form_validation->set_rules('description', 'Description', 'trim|required');
				$this->form_validation->set_rules('imagefile','ImageFile','callback_handle_upload');
				
				if ( FALSE == $this->form_validation->run() )
				{	
					$data['errors'] = validation_errors();
				}
				else
				{

					$title 			= 	$this	-> input 	-> post('title');
					$description 	= 	$this 	-> input 	-> post('description'); 
					$pro_cat_id 	=	$this	-> input 	-> post('pro_categoriesid');
					$price    		=	$this	-> input 	-> post('price');

					$image_name = "imagefile";
					
					$upload = upload_image($image_name);

					if (false == $upload) 
					{
						redirect('admin/product/add_product');
					}

					
					$upload_data = $this->upload->data(); 
					$file_name =   $upload_data['file_name'];
					
					$image_path = UPLOAD_ROOT_PATH."/".$file_name;
					$width = 60;
					$height = 50;
					
					$resize = resize_image($image_path,$width,$height);
					 
					if (TRUE == $resize) 
					{
						
						$data  = array(
										'title' 				=> $title,
										'product_categoriesid' 	=> $pro_cat_id,
										'description' 			=> $description,
										'image_name' 			=> $file_name,
										'price'					=> $price
										
									);
						$result = $this->Product_model->add_product($data);
						//  echo $pro_cat_id;
					 // die;
						if (TRUE == $result) 
						{
							//echo $result;
							redirect('admin/home/deshboard');
						}
						else
						{
							redirect('admin/product/add_product');
						}
					}

					
				}
			}
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/sidebar_list');
			$this->load->view('admin/product/add_product', $data);
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
		* @function :  we used this function for edit the product  
		* @parametere :$id  means the product catrgories id  
		* @parametere : 
		*/
		
		public function edit_product($id)
		{
			
			$result = $this->Product_model->edit_product($id);

			$results = $this->Product_model->read_all();
			
			$data['results'] = $results;
			
			$data['result']	= 	$result;
			 // echo $id;
			 // die;
			$this->load->view('admin/includes/header');	
			$this->load->view('admin/includes/sidebar_list');

			$this->load->view('admin/product/edit_product',$data);
			$this->load->view('admin/includes/footer');	
		}

		//======================================================

		/**
		* @function :  we used this function for edit product process 
		* @parametere :  
		* @parametere : 
		*/

		public function edit_process_product()
		{
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('price', 'Price', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');

			if ( FALSE == $this->form_validation->run() )
			{	
				$data['errors'] = validation_errors();
				$id             = $this -> input -> post('id');
				redirect('admin/product/edit_product/'.$id);
			}
			else
			{	
				$id             = $this -> input -> post('id');
				$title 			= $this	-> input -> post('title');
				$price          = $this -> input -> post('price');
				$description 	= $this -> input -> post ('description');
				$file_name 		= $this	-> input -> post('image_name'); 
				$pro_cat_id 	= $this -> input -> post('pro_categoriesid'); 
				
				if (empty($_FILES['editimagefile']['name'])&& $_FILES['imagefile']['name'] == "") 
				{
					
					
					$pro_data  	= array(
										'id'			=> $id,
										'product_categoriesid' => $pro_cat_id,
										'title' 		=> $title,
										'price'			=> $price,
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
						redirect('admin/product/edit_product/'.$id);
					}
						
					unlink(UPLOAD_ROOT_PATH."/".$file_name);
					
					$upload_data = $this->upload->data(); 
					$file_name =   $upload_data['file_name'];
					
					$image_path = UPLOAD_ROOT_PATH."/".$file_name;
					$width = 60;
					$height = 50;
					
					$resize =resize_image($image_path,$width,$height);
					
					if (TRUE == $resize) 
					{

						
						$pro_data  	= array(
											'id'	=>$id,
											'product_categoriesid' => $pro_cat_id,
											'title' => $title,
											'price' => $price,
											'description' => $description,
											'image_name' => $file_name 
										);
					}

				}
				
				$result = $this->Product_model->edit_process_product($pro_data);
			
				if (TRUE == $result) 
				{
					redirect('admin/product/product_list');
				}
				else
				{
					redirect('admin/product/edit_product/'.$id);
				}
			}
			
		}
	}