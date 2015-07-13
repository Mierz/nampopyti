<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Routeedit extends CI_Controller {

	public function index() {
		redirect(base_url());
	}
	
	public function action($act = null) {
		if($act != null) {
			$this->load->model('Routes_model');
			$this->Routes_model->busEdit();
		}
		redirect(base_url());
	}
}