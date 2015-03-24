<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Routes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('layout', 'layout_inner');
		$this->layout->setLayout('layout_inner');

		$access_list = ['create', 'edit', 'delete'];

		foreach ($access_list as $item) {
			if($item == $this->router->fetch_method()) {
				if (!$this->tank_auth->is_logged_in()) {					
					redirect('/');
				}
			} 			
		}
	}
	
	public function index()
	{
		
	}

	public function create()
	{		
		$this->form_validation->set_rules('from', 'From', 'trim|required|xss_clean');
		$this->form_validation->set_rules('to', 'To', 'trim|required|xss_clean');
		$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');

		if ($this->form_validation->run()) {	
			echo "ok";
		} else {

		}


		$data = [];
		$this->layout->view('/routes/create', $data);		
	}

	public function view($id)
	{
		$route = $this->Routes_model->get('routes', ['id' => $id]);		
		$user = $this->Routes_model->get('users', ['id' => $route[0]->user_id]);

		$data = ['route' => $route, 'user' => $user];
		$this->layout->view('/routes/view', $data);
	}

	public function edit()
	{

	}

	public function delete()
	{

	}

	public function search()
	{
		$get = $this->input->get();
		if(empty($get)) {
			echo "ok";
		}
	
		$routes = $this->Routes_model->get('routes', ['from' => $this->input->get('from'), 'to' => $this->input->get('to')]);
		$data = ['routes' => $routes];
		$this->layout->view('/routes/search', $data);
	}
	
}
