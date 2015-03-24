<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Routes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('layout', 'layout_main');
	}
	
	public function index()
	{
		
	}

	public function create()
	{

	}

	public function view($id)
	{

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
