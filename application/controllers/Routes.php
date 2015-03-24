<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Routes extends CI_Controller {
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function create()
	{

	}

	public function edit()
	{

	}

	public function delete()
	{

	}

	public function view($id)
	{
		if(!empty($id)) 
		{
			echo $id;
		} else {			
			redirect('/');
		}
	}

	public function search()
	{
		$this->input->get('from') != "" ? $from = $this->input->get('from') : $from = '';
		$this->input->get('to') != "" ? $to = $this->input->get('to') : $from = '';

		if(!empty($from) && !empty($to)) {
			$routes = $this->Routes_model->get_routes($from, $to);
			$this->load->view('routes/search', ['routes' => $routes]);
		} else {
			redirect('/');
		}

		
	}
}
