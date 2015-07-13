<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @author mieRz  
* @copyright 2013  
* 04.08.2013  
* Описание файла: Контроллер Объявления 
*/ 

class Board extends CI_Controller {
	
	public function index() {
		if($this->session->userdata('logged_in')) {
			$this->load->model('Routes_model');
			$config['base_url'] = base_url() . 'board/index/';
			$config['total_rows'] = $this->Routes_model->cntUserRoutes($this->session->userdata('id'));
			$config['per_page'] = 10;
	
			$this->pagination->initialize($config);

			$data['routes_active'] = $this->Routes_model->getBoards($config['per_page'],$this->uri->segment(3));
		
			$data['form_login'] = $this->userlib->auth_menu();	
			$this->load->view('board/board', $data);
		} else {
			redirect(base_url());
		}		
	}
	
	public function edit($id = null) {
		if($this->session->userdata('logged_in')) {
			if($id != null) {
				$this->load->model('Routes_model');	
				$access = $this->Routes_model->getId($id);
							
				if($access == $this->session->userdata('id')) {	
					$data['form_login'] = $this->userlib->auth_menu();
					$group = $this->Routes_model->getGroup($id);
					if($group == 1) {	
						$this->load->view('board/edit_passenger', $data);
					}
					if($group == 2) {
						$const = $this->Routes_model->getConst($id);
						if($const == 1) {
						
						
							if ($this->form_validation->run('route_driver') == FALSE) {
								$data['id'] = $id;
								$data['data'] = $this->Routes_model->getEditData($id);
								$this->load->view('board/edit_bus', $data);
							}
							else {	
								$this->load->model('Routes_model');
								
								$data = array (	'to'        		=> $this->input->post('fto'),
												'from'      		=> $this->input->post('ffrom'),
												'seats' 			=> $this->input->post('seats'),
												'car'				=> $this->input->post('car'),
												'price' 			=> $this->input->post('price'),
												'pos'				=> $this->input->post('pos'),
												'comment'			=> $this->input->post('comment'),
												'poa'				=> $this->input->post('poa')
												);
												
								$points = array ();
								
								if($this->input->post('p1')) {
									$p1 = array ('p1' => $this->input->post('p1'));
									$points = $points + $p1;
								}
								if($this->input->post('p2')) {
									$p2 = array ('p2' => $this->input->post('p2'));
									$points = $points + $p2;
								}
								if($this->input->post('p3')) {
									$p3 = array ('p3' => $this->input->post('p3'));
									$points = $points + $p3;
								}
								if($this->input->post('p4')) {
									$p4 = array ('p4' => $this->input->post('p4'));
									$points = $points + $p4;
								}
								if($this->input->post('p5')) {
									$p5 = array ('p5' => $this->input->post('p5'));
									$points = $points + $p5;
								}
								if($this->input->post('p6')) {
									$p6 = array ('p6' => $this->input->post('p6'));
									$points = $points + $p6;
								}	
								
								$shelude = null;
								
								if($this->input->post('si1')) {
									$shelude .= $this->input->post('si1');
								}
								if($this->input->post('si2')) {
									$shelude .= "," . $this->input->post('si2') . ",";
								}
								if($this->input->post('si3')) {
									$shelude .= $this->input->post('si3') . ",";
								}
								if($this->input->post('si4')) {
									$shelude .= $this->input->post('si4') . ",";
								}
								if($this->input->post('si5')) {
									$shelude .= $this->input->post('si5') . ",";
								}
								if($this->input->post('si6')) {
									$shelude .= $this->input->post('si6') . ",";
								}
								if($this->input->post('si7')) {
									$shelude .= $this->input->post('si7') . ",";
								}
								if($this->input->post('si8')) {
									$shelude .= $this->input->post('si8') . ",";
								}
								if($this->input->post('si9')) {
									$shelude .= $this->input->post('si9') . ",";
								}
								if($this->input->post('si10')) {
									$shelude .= $this->input->post('si10') . ",";
								}
								if($this->input->post('si11')) {
									$shelude .= $this->input->post('si11') . ",";
								}
								if($this->input->post('si12')) {
									$shelude .= $this->input->post('si12') . ",";
								}
								if($this->input->post('si13')) {
									$shelude .= $this->input->post('si13') . ",";
								}
								if($this->input->post('si14')) {
									$shelude .= $this->input->post('si14') . ",";
								}
								if($this->input->post('si15')) {
									$shelude .= $this->input->post('si15') . ",";
								}
								if($this->input->post('si16')) {
									$shelude .= $this->input->post('si16') . ",";
								}
								if($this->input->post('si17')) {
									$shelude .= $this->input->post('si17') . ",";
								}
								if($this->input->post('si18')) {
									$shelude .= $this->input->post('si18') . ",";
								}
								if($this->input->post('si19')) {
									$shelude .= $this->input->post('si19') . ",";
								}
								if($this->input->post('si20')) {
									$shelude .= $this->input->post('si20');
								}
																			
								if($this->Routes_model->edit($id, $data, $points, $shelude)) {
									$data['form_login'] = $this->userlib->auth_menu();
									$this->load->view('route/succesfull', $data);
								}				
							
							}
							
						} else {
							
							
							if ($this->form_validation->run('route_driver') == FALSE) {
								$data['id'] = $id;
								$data['data'] = $this->Routes_model->getEditData($id);
								$this->load->view('board/edit_driver', $data);
							}
							else {	
								$this->load->model('Routes_model');
								
								$data = array (	'to'        		=> $this->input->post('fto'),
												'from'      		=> $this->input->post('ffrom'),
												'seats' 			=> $this->input->post('seats'),
												'car'				=> $this->input->post('car'),
												'price' 			=> $this->input->post('price'),
												'pos'				=> $this->input->post('pos'),
												'comment'			=> $this->input->post('comment'),
												'poa'				=> $this->input->post('poa')
												);
												
								$points = array ();
								
								if($this->input->post('p1')) {
									$p1 = array ('p1' => $this->input->post('p1'));
									$points = $points + $p1;
								}
								if($this->input->post('p2')) {
									$p2 = array ('p2' => $this->input->post('p2'));
									$points = $points + $p2;
								}
								if($this->input->post('p3')) {
									$p3 = array ('p3' => $this->input->post('p3'));
									$points = $points + $p3;
								}
								if($this->input->post('p4')) {
									$p4 = array ('p4' => $this->input->post('p4'));
									$points = $points + $p4;
								}
								if($this->input->post('p5')) {
									$p5 = array ('p5' => $this->input->post('p5'));
									$points = $points + $p5;
								}
								if($this->input->post('p6')) {
									$p6 = array ('p6' => $this->input->post('p6'));
									$points = $points + $p6;
								}	
								
								$shelude = null;
								
								if($this->input->post('si1')) {
									$shelude .= $this->input->post('si1');
								}
								if($this->input->post('si2')) {
									$shelude .= "," . $this->input->post('si2') . ",";
								}
								if($this->input->post('si3')) {
									$shelude .= $this->input->post('si3') . ",";
								}
								if($this->input->post('si4')) {
									$shelude .= $this->input->post('si4') . ",";
								}
								if($this->input->post('si5')) {
									$shelude .= $this->input->post('si5') . ",";
								}
								if($this->input->post('si6')) {
									$shelude .= $this->input->post('si6') . ",";
								}
								if($this->input->post('si7')) {
									$shelude .= $this->input->post('si7') . ",";
								}
								if($this->input->post('si8')) {
									$shelude .= $this->input->post('si8') . ",";
								}
								if($this->input->post('si9')) {
									$shelude .= $this->input->post('si9') . ",";
								}
								if($this->input->post('si10')) {
									$shelude .= $this->input->post('si10') . ",";
								}
								if($this->input->post('si11')) {
									$shelude .= $this->input->post('si11') . ",";
								}
								if($this->input->post('si12')) {
									$shelude .= $this->input->post('si12') . ",";
								}
								if($this->input->post('si13')) {
									$shelude .= $this->input->post('si13') . ",";
								}
								if($this->input->post('si14')) {
									$shelude .= $this->input->post('si14') . ",";
								}
								if($this->input->post('si15')) {
									$shelude .= $this->input->post('si15') . ",";
								}
								if($this->input->post('si16')) {
									$shelude .= $this->input->post('si16') . ",";
								}
								if($this->input->post('si17')) {
									$shelude .= $this->input->post('si17') . ",";
								}
								if($this->input->post('si18')) {
									$shelude .= $this->input->post('si18') . ",";
								}
								if($this->input->post('si19')) {
									$shelude .= $this->input->post('si19') . ",";
								}
								if($this->input->post('si20')) {
									$shelude .= $this->input->post('si20');
								}
																			
								if($this->Routes_model->edit($id, $data, $points, $shelude)) {
									$data['form_login'] = $this->userlib->auth_menu();
									$this->load->view('route/succesfull', $data);
								}	
							}
						}
					}
					
				}	else {
					redirect(base_url());
				}
			}
			else {
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}	
	}
	
	public function delete($id = null) {
		if($this->session->userdata('logged_in')) {
			if(!$id == null) {
				$this->load->model('Routes_model');	
				$access = $this->Routes_model->getId($id);
							
				if($access == $this->session->userdata('id')) {	
					if($this->Routes_model->delete($id)) {
						redirect(base_url() . "/board/");
					}
				}	else {
					redirect(base_url());
				}
			}
			else {
				redirect(base_url(). "user/join");
			}		
		} else {
			redirect(base_url());
		}	
	}
	
}