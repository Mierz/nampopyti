<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('layout', 'layout_main');
	}
	
	public function index()
	{		
		$companions = $this->Routes_model->get('routes', ['category' => 1]);
		$drivers = $this->Routes_model->get('routes', ['category' => 2]);
		
		$data = ['companions' => $companions, 'drivers' => $drivers];
		$this->layout->view('/main/index', $data);		
	}
}
