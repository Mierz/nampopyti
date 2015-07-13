<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @author mieRz  
* @copyright 2013  
* 02.07.2013  
* Описание файла: Контроллер Личные сообщения
*/ 

class Msg extends CI_Controller {
	
	public function index() {	
		if($this->session->userdata('logged_in')) {
			$this->load->model('Msg_model');
			
			$config['base_url'] = base_url() . 'msg/index/';
			$config['total_rows'] = $this->Msg_model->getCount($this->session->userdata('id'));
			$config['per_page'] = 10;
	
			$this->pagination->initialize($config);

			$data['list'] = $this->Msg_model->get_list($config['per_page'],$this->uri->segment(3));
		
			$data['form_login'] = $this->userlib->auth_menu();	
			$this->load->view('msg/list', $data);
		}
		else {
			redirect(base_url());
		}
	}
		
	//написать сообщение
	public function send($id = null) {
		if($this->session->userdata('logged_in')) {
			if(!$id == null) {
				if($this->session->userdata('logged_in')) {
					if ($this->form_validation->run('msg') == FALSE) {
						$data['form_login'] = $this->userlib->auth_menu();
						$data['id'] = $id;
						
						$this->load->view('msg/write', $data);
					}
					else {
						$this->load->model('Msg_model');				
					
						if($this->Msg_model->write($id,$this->session->userdata('id'),$this->input->post('title'),$this->input->post('msg'))) {
							$data['form_login'] = $this->userlib->auth_menu();
							$this->load->view('msg/success', $data);
						}
					}
				}
				else {
					redirect(base_url(). "user/join");
				}
			}
		}
		else {
			redirect(base_url());
		}
	}
	
	public function view($id = null) {
		if($this->session->userdata('logged_in')) {
			if(!$id == null) {
				$this->load->model('Msg_model');	
				$access = $this->Msg_model->getId($id);
							
				if($access == $this->session->userdata('id')) {			
					$this->Msg_model->read($id);
					
					$data['form_login'] = $this->userlib->auth_menu();
					$data['msg'] = $this->Msg_model->view($id);
					
					$this->load->view('msg/view', $data);
				} else {
					redirect(base_url());
				}
			}
			else {
				redirect(base_url(). "user/join");
			}
		}
		else {
			redirect(base_url());
		}
	}
	
	public function delete($id = null) {
		if($this->session->userdata('logged_in')) {
			if(!$id == null) {
				$this->load->model('Msg_model');	
				$access = $this->Msg_model->getId($id);
							
				if($access == $this->session->userdata('id')) {	
					if($this->Msg_model->delete($id)) {
						redirect(base_url() . "msg/");
					}
				}	else {
					redirect(base_url());
				}
			}
			else {
				redirect(base_url(). "user/join");
			}		
		}
		else {
			redirect(base_url());
		}
	}	
}