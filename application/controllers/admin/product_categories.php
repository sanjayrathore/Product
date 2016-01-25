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
	}