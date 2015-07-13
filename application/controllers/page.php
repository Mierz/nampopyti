<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @author mieRz  
* @copyright 2013  
* 11.08.2013  
* Описание файла: Контроллер Страници 
*/ 

class Page extends CI_Controller {

	public function index() {
		redirect(base_url());
	}
	
	public function about() {
            $data['form_login'] = $this->userlib->auth_menu();
            $this->load->view('page/about', $data);            
	}
      
        public function contacts() {
		if ($this->form_validation->run('contact') == FALSE) {
			$data['form_login'] = $this->userlib->auth_menu();
			$this->load->view('page/contacts', $data);
		}
		else {
			$msg = "<p><b>Тип:</b> ".$this->input->post('type')."</p>
					<p><b>Почта:</b> ".$this->input->post('email')."</p>
					<p><b>Телефон:</b> ".$this->input->post('phone')."</p>
					<p><b>Тема:</b> ".$this->input->post('subject')."</p>
					<p><b>Сообщение:</b></p> <p>".$this->input->post('msg')."</p>";
		
			$this->userlib->send_mail('support@nampopyti.com', 'Сообщение с сайта', $msg);
			
			$data['form_login'] = $this->userlib->auth_menu();
			$data['send'] = true;
			$this->load->view('page/contacts', $data);
		}		
	}	
	
	public function cooperation() {
		$data['form_login'] = $this->userlib->auth_menu();
		$this->load->view('page/cooperation', $data);		
	}
	
	public function rules() {
		$data['form_login'] = $this->userlib->auth_menu();
		$this->load->view('page/rules', $data);		
	}
	
	public function agreement() {
		$data['form_login'] = $this->userlib->auth_menu();
		$this->load->view('page/agreement', $data);		
	}
	
	
}