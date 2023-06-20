<?php
	class Pages extends BaseController 
	{
		public function __construct() 
		{           
			//$this->userModel = $this->model('User');
		}

		public function index() 
		{
			$data = ['title' => 'Home page'];

			$this->view('index', $data);
		}

		public function Sollicitatie() 
		{
			$this->view('index');
		}

		// public function about() 
		// {
		//     $this->view('about');
		// }
	}
?>
