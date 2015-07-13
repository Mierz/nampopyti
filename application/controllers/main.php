<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @author mieRz  
* @copyright 2013  
* 19.06.2013  
* Описание файла: Контроллер Главная  
*/ 

class Main extends CI_Controller {
    
    private $_user;
    
    public function index() {	
        $this->load->library('partialcache');
        
        $this->user = $this->session->userdata('id');
        
        if($this->session->userdata('logged_in')) {
            if($this->userlib->checkEmail($this->_user)) {
                $data['noEmail'] = true;
            }
            if($this->userlib->checkPhone($this->_user)) {
                $data['noPhone'] = true;
            }
        }
        
        if ($this->form_validation->run('search') == FALSE) {           
            $data['pass'] = $this->Routes_model->view(1);
            $data['driver'] = $this->Routes_model->view(2);
            $data['bus'] = $this->Routes_model->view(2, true);
            
            $data['form_login'] = $this->userlib->auth_menu();
            
            $this->load->view('main', $data);
        }
        else {
            $data['form_login'] = $this->userlib->auth_menu();
            $data['text'] = $this->Routes_model->search_route($this->input->post('from'), $this->input->post('to'));
            $data['from'] = $this->input->post('from');
            $data['to'] = $this->input->post('to');
            $data['type'] = 0;
            $data['date'] = date("Y-m-d");					
            $this->load->view('route/search', $data);
        }
    }
}