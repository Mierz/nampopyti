<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @author mieRz  
* @copyright 2013  
* 19.06.2013  
* Описание файла: Контроллер Маршруты  
*/ 

class Route extends CI_Controller {
	
	//главная
	public function index() {	
		redirect(base_url());
	}
	
	//добавление маршрута пасажиром
	public function passenger() {	
		if($this->session->userdata('logged_in')) {
			if ($this->form_validation->run('route') == FALSE) {
				$data['form_login'] = $this->userlib->auth_menu();
				$this->load->view('route/add_passenger', $data);
			}
			else {	
				$this->load->model('Routes_model');
				
				$data = array (	'group_id'			=> $this->input->post('group'),
								'author'			=> $this->session->userdata('id'),
								'to'				=> $this->input->post('fto'),
								'from'				=> $this->input->post('ffrom'),
								'date'				=> $this->input->post('date'),
								'seats'				=> $this->input->post('seats')								
								);
					
				if($this->input->post('hour')) {
					$hour = array ('departure_h' => $this->input->post('hour'));
					$data = $data + $hour;
				}
				if($this->input->post('min')) { 
					$min = array ('departure_m'	=> $this->input->post('min'));
					$data = $data + $min;
				}
				if($this->input->post('dop')) {
					$dop = array ('departure_lapse'	=> $this->input->post('dop'));
					$data = $data + $dop;
				}
				
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
				
				if($this->Routes_model->add($data, $points)) {
					$data['form_login'] = $this->userlib->auth_menu();
					$this->load->view('route/succesfull', $data);
				}
			}	
		}	
		else {
			redirect(base_url() . "user/join");
		}
	}
	
	//добавление маршрута водителем
	public function driver() {	
		if($this->session->userdata('logged_in')) {
			if ($this->form_validation->run('route_driver') == FALSE) {
					$data['form_login'] = $this->userlib->auth_menu();
					$this->load->view('route/add_driver', $data);
			}
			else {	
				$this->load->model('Routes_model');
				
				$data = array (	'group_id'  		=> $this->input->post('group'),
								'author' 			=> $this->session->userdata('id'),
								'to'        		=> $this->input->post('fto'),
								'from'      		=> $this->input->post('ffrom'),
								'date' 				=> $this->input->post('departure_date'),
								'seats' 			=> $this->input->post('seats'),
								'price' 			=> $this->input->post('price'),
								'pos'				=> $this->input->post('pos'),
								'poa'				=> $this->input->post('poa'),
                                                                'active'    => '1'                                        
								);
								
				if($this->input->post('comment')) {
					$comment = array ('comment' => $this->input->post('comment'));
					$data = $data + $comment;
				}
				if($this->input->post('hour')) {
					$hour = array ('departure_h' => $this->input->post('hour'));
					$data = $data + $hour;
				}
				if($this->input->post('min')) { 
					$min = array ('departure_m'	=> $this->input->post('min'));
					$data = $data + $min;
				}
				if($this->input->post('dop')) {
					$dop = array ('departure_lapse'	=> $this->input->post('dop'));
					$data = $data + $dop;
				}
				if($this->input->post('return_date')) {
					$date_return = array ('date_return'	=> $this->input->post('return_date'));
					$data = $data + $date_return;
				}
				if($this->input->post('hour_return')) {
					$return_h = array ('return_h'	=> $this->input->post('hour_return'));
					$data = $data + $return_h;
				}
				if($this->input->post('min_return')) {
					$return_m = array ('return_m'	=> $this->input->post('min_return'));
					$data = $data + $return_m;
				}
				if($this->input->post('dop_return')) {
					$return_lapse = array ('return_lapse'	=> $this->input->post('dop_return'));
					$data = $data + $return_lapse;
				}
				if($this->input->post('const')) {
					$const = array ('const'	=> $this->input->post('const'));
					$data = $data + $const;
				}
				
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
								
				if($this->Routes_model->add($data, $points)) {
					$data['form_login'] = $this->userlib->auth_menu();
					$this->load->view('route/succesfull', $data);
				}
			}
		}
		else {
			redirect(base_url() . "user/join");
		}
	}
	
	public function bus() {
		if($this->session->userdata('logged_in')) {
			if ($this->form_validation->run('route_driver') == FALSE) {
					$data['form_login'] = $this->userlib->auth_menu();
					$this->load->view('route/add_bus', $data);
			}
			else {	
				$this->load->model('Routes_model');
				
				$data = array (	'group_id'  		=> $this->input->post('group'),
								'author' 			=> $this->session->userdata('id'),
								'to'        		=> $this->input->post('fto'),
								'from'      		=> $this->input->post('ffrom'),
								'date' 				=> date('Y-m-d'),
								'seats' 			=> $this->input->post('seats'),
								'price' 			=> $this->input->post('price'),
								'pos'				=> $this->input->post('pos'),
								'poa'				=> $this->input->post('poa'),
								'const'				=> 1
								);
								
				if($this->input->post('comment')) {
					$com = array ('comment'=>$this->input->post('comment'));
					$data = $com + $data;
				}
								
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
			
				if($this->input->post('t_f_1')) {
					$shelude .= $this->input->post('t_f_1') . ",";
				}
				if($this->input->post('t_f_2')) {
					$shelude .= $this->input->post('t_f_2') . ",";
				}
				if($this->input->post('t_f_3')) {
					$shelude .= $this->input->post('t_f_3') . ",";
				}
				if($this->input->post('t_f_4')) {
					$shelude .= $this->input->post('t_f_4') . ",";
				}
				if($this->input->post('t_f_5')) {
					$shelude .= $this->input->post('t_f_5') . ",";
				}
				if($this->input->post('t_f_6')) {
					$shelude .= $this->input->post('t_f_6') . ",";
				}
				if($this->input->post('t_f_7')) {
					$shelude .= $this->input->post('t_f_7') . ",";
				}
				if($this->input->post('t_f_8')) {
					$shelude .= $this->input->post('t_f_8') . ",";
				}
				if($this->input->post('t_f_9')) {
					$shelude .= $this->input->post('t_f_9') . ",";
				}
				if($this->input->post('t_f_10')) {
					$shelude .= $this->input->post('t_f_10') . ",";
				}
				if($this->input->post('t_f_11')) {
					$shelude .= $this->input->post('t_f_11') . ",";
				}
				if($this->input->post('t_f_12')) {
					$shelude .= $this->input->post('t_f_12') . ",";
				}
				if($this->input->post('t_f_13')) {
					$shelude .= $this->input->post('t_f_13') . ",";
				}
				if($this->input->post('t_f_14')) {
					$shelude .= $this->input->post('t_f_14') . ",";
				}
				if($this->input->post('t_f_15')) {
					$shelude .= $this->input->post('t_f_15') . ",";
				}
				if($this->input->post('t_f_16')) {
					$shelude .= $this->input->post('t_f_16') . ",";
				}
				if($this->input->post('t_f_17')) {
					$shelude .= $this->input->post('t_f_17') . ",";
				}
				if($this->input->post('t_f_18')) {
					$shelude .= $this->input->post('t_f_18') . ",";
				}
				if($this->input->post('t_f_19')) {
					$shelude .= $this->input->post('t_f_19') . ",";
				}
				if($this->input->post('t_f_20')) {
					$shelude .= $this->input->post('t_f_20') . ",";
				}
				if($this->input->post('t_f_21')) {
					$shelude .= $this->input->post('t_f_21') . ",";
				}
				if($this->input->post('t_f_22')) {
					$shelude .= $this->input->post('t_f_22') . ",";
				}
				if($this->input->post('t_f_23')) {
					$shelude .= $this->input->post('t_f_23') . ",";
				}
				if($this->input->post('t_f_24')) {
					$shelude .= $this->input->post('t_f_24') . ",";
				}
				if($this->input->post('t_f_25')) {
					$shelude .= $this->input->post('t_f_25') . ",";
				}
				if($this->input->post('t_f_26')) {
					$shelude .= $this->input->post('t_f_26') . ",";
				}
				if($this->input->post('t_f_27')) {
					$shelude .= $this->input->post('t_f_27') . ",";
				}
				if($this->input->post('t_f_28')) {
					$shelude .= $this->input->post('t_f_28') . ",";
				}
				if($this->input->post('t_f_29')) {
					$shelude .= $this->input->post('t_f_29') . ",";
				}
				if($this->input->post('t_f_30')) {
					$shelude .= $this->input->post('t_f_30') . ",";
				}
				if($this->input->post('t_f_31')) {
					$shelude .= $this->input->post('t_f_31') . ",";
				}
				if($this->input->post('t_f_32')) {
					$shelude .= $this->input->post('t_f_32') . ",";
				}
				if($this->input->post('t_f_33')) {
					$shelude .= $this->input->post('t_f_33') . ",";
				}
				if($this->input->post('t_f_34')) {
					$shelude .= $this->input->post('t_f_34') . ",";
				}
				if($this->input->post('t_f_35')) {
					$shelude .= $this->input->post('t_f_35') . ",";
				}
				if($this->input->post('t_f_36')) {
					$shelude .= $this->input->post('t_f_36') . ",";
				}
				if($this->input->post('t_f_37')) {
					$shelude .= $this->input->post('t_f_37') . ",";
				}
				if($this->input->post('t_f_38')) {
					$shelude .= $this->input->post('t_f_38') . ",";
				}
				if($this->input->post('t_f_39')) {
					$shelude .= $this->input->post('t_f_39') . ",";
				}
				if($this->input->post('t_f_40')) {
					$shelude .= $this->input->post('t_f_40') . ",";
				}
				if($this->input->post('t_f_41')) {
					$shelude .= $this->input->post('t_f_41') . ",";
				}
				if($this->input->post('t_f_42')) {
					$shelude .= $this->input->post('t_f_42') . ",";
				}
				if($this->input->post('t_f_43')) {
					$shelude .= $this->input->post('t_f_43') . ",";
				}
				if($this->input->post('t_f_44')) {
					$shelude .= $this->input->post('t_f_44') . ",";
				}
				if($this->input->post('t_f_45')) {
					$shelude .= $this->input->post('t_f_45') . ",";
				}
				if($this->input->post('t_f_46')) {
					$shelude .= $this->input->post('t_f_46') . ",";
				}
				if($this->input->post('t_f_47')) {
					$shelude .= $this->input->post('t_f_47') . ",";
				}
				if($this->input->post('t_f_48')) {
					$shelude .= $this->input->post('t_f_48') . ",";
				}
				if($this->input->post('t_f_49')) {
					$shelude .= $this->input->post('t_f_49') . ",";
				}
				if($this->input->post('t_f_50')) {
					$shelude .= $this->input->post('t_f_50') . ",";
				}
				if($this->input->post('t_f_51')) {
					$shelude .= $this->input->post('t_f_51') . ",";
				}
				if($this->input->post('t_f_52')) {
					$shelude .= $this->input->post('t_f_52') . ",";
				}
				if($this->input->post('t_f_53')) {
					$shelude .= $this->input->post('t_f_53') . ",";
				}
				if($this->input->post('t_f_54')) {
					$shelude .= $this->input->post('t_f_54') . ",";
				}
				if($this->input->post('t_f_55')) {
					$shelude .= $this->input->post('t_f_55') . ",";
				}
				if($this->input->post('t_f_56')) {
					$shelude .= $this->input->post('t_f_56') . ",";
				}
				if($this->input->post('t_f_57')) {
					$shelude .= $this->input->post('t_f_57') . ",";
				}
				if($this->input->post('t_f_58')) {
					$shelude .= $this->input->post('t_f_58') . ",";
				}
				if($this->input->post('t_f_59')) {
					$shelude .= $this->input->post('t_f_59') . ",";
				}
				if($this->input->post('t_f_60')) {
					$shelude .= $this->input->post('t_f_60') . ",";
				}
				if($this->input->post('t_f_61')) {
					$shelude .= $this->input->post('t_f_61') . ",";
				}
				if($this->input->post('t_f_62')) {
					$shelude .= $this->input->post('t_f_62') . ",";
				}
				if($this->input->post('t_f_63')) {
					$shelude .= $this->input->post('t_f_63') . ",";
				}
				if($this->input->post('t_f_64')) {
					$shelude .= $this->input->post('t_f_64') . ",";
				}
				if($this->input->post('t_f_65')) {
					$shelude .= $this->input->post('t_f_65') . ",";
				}
				if($this->input->post('t_f_66')) {
					$shelude .= $this->input->post('t_f_66') . ",";
				}
				if($this->input->post('t_f_67')) {
					$shelude .= $this->input->post('t_f_67') . ",";
				}
				if($this->input->post('t_f_68')) {
					$shelude .= $this->input->post('t_f_68') . ",";
				}
				if($this->input->post('t_f_69')) {
					$shelude .= $this->input->post('t_f_69') . ",";
				}
				if($this->input->post('t_f_70')) {
					$shelude .= $this->input->post('t_f_70') . ",";
				}
				if($this->input->post('t_f_71')) {
					$shelude .= $this->input->post('t_f_71') . ",";
				}
				if($this->input->post('t_f_72')) {
					$shelude .= $this->input->post('t_f_72') . ",";
				}
				if($this->input->post('t_f_73')) {
					$shelude .= $this->input->post('t_f_73') . ",";
				}
				if($this->input->post('t_f_74')) {
					$shelude .= $this->input->post('t_f_74') . ",";
				}
				if($this->input->post('t_f_75')) {
					$shelude .= $this->input->post('t_f_75') . ",";
				}
				if($this->input->post('t_f_76')) {
					$shelude .= $this->input->post('t_f_76') . ",";
				}
				if($this->input->post('t_f_77')) {
					$shelude .= $this->input->post('t_f_77') . ",";
				}
				if($this->input->post('t_f_78')) {
					$shelude .= $this->input->post('t_f_78') . ",";
				}
				if($this->input->post('t_f_79')) {
					$shelude .= $this->input->post('t_f_79') . ",";
				}
				if($this->input->post('t_f_80')) {
					$shelude .= $this->input->post('t_f_80') . ",";
				}
				if($this->input->post('t_f_81')) {
					$shelude .= $this->input->post('t_f_81') . ",";
				}
				if($this->input->post('t_f_82')) {
					$shelude .= $this->input->post('t_f_82') . ",";
				}
				if($this->input->post('t_f_83')) {
					$shelude .= $this->input->post('t_f_83') . ",";
				}
				if($this->input->post('t_f_84')) {
					$shelude .= $this->input->post('t_f_84') . ",";
				}
				if($this->input->post('t_f_85')) {
					$shelude .= $this->input->post('t_f_85') . ",";
				}
				if($this->input->post('t_f_86')) {
					$shelude .= $this->input->post('t_f_86') . ",";
				}
				if($this->input->post('t_f_87')) {
					$shelude .= $this->input->post('t_f_87') . ",";
				}
				if($this->input->post('t_f_88')) {
					$shelude .= $this->input->post('t_f_88') . ",";
				}
				if($this->input->post('t_f_89')) {
					$shelude .= $this->input->post('t_f_89') . ",";
				}
				if($this->input->post('t_f_90')) {
					$shelude .= $this->input->post('t_f_90') . ",";
				}
				if($this->input->post('t_f_91')) {
					$shelude .= $this->input->post('t_f_91') . ",";
				}
				if($this->input->post('t_f_92')) {
					$shelude .= $this->input->post('t_f_92') . ",";
				}
				if($this->input->post('t_f_93')) {
					$shelude .= $this->input->post('t_f_93') . ",";
				}
				if($this->input->post('t_f_94')) {
					$shelude .= $this->input->post('t_f_94') . ",";
				}
				if($this->input->post('t_f_95')) {
					$shelude .= $this->input->post('t_f_95') . ",";
				}
				if($this->input->post('t_f_96')) {
					$shelude .= $this->input->post('t_f_96') . ",";
				}
												
				if($this->Routes_model->add($data, $points, $shelude)) {
					$data['form_login'] = $this->userlib->auth_menu();
					$this->load->view('route/succesfull', $data);
				}
			}
		}
		else {
			redirect(base_url() . "user/join");
		}
	}
	
	//поиск
	public function search() {
		$this->load->model('Routes_model');
                                
                //redirect('route/search/?from='.$this->input->post('from').'&to=' . $this->input->post('to'));
		
		if($this->input->post('from') && $this->input->post('to')) {		
			$data['form_login'] = $this->userlib->auth_menu();
			$data['text'] = $this->Routes_model->search_route($this->input->post('from'), $this->input->post('to'));
			$data['from'] = $this->input->post('from');
			$data['to'] = $this->input->post('to');
			$data['type'] = 0;
			$data['date'] = date("Y-m-d");
					
			$this->load->view('route/search', $data);
		}
		else {
			if($this->input->post('ffrom') && $this->input->post('fto')) {				
				$data['form_login'] = $this->userlib->auth_menu();
				$data['text'] = $this->Routes_model->search_route($this->input->post('ffrom'), $this->input->post('fto'), $this->input->post('type-route'), $this->input->post('date'), $this->input->post('seats'));
				$data['from'] = $this->input->post('ffrom');
				$data['to'] = $this->input->post('fto');
				if($this->input->post('type-route')) {
					$data['type'] = $this->input->post('type-route');
				} else {
					$data['type'] = 0;
				}
				if($this->input->post('date')) {
					$data['date'] = $this->input->post('date');
				} else {
					$data['date'] = date("Y-m-d");
				}
				if($this->input->post('seats')) {
					$data['seats'] = $this->input->post('seats');
				}
				
				$this->load->view('route/search', $data);
			}
			else {
				$data['form_login'] = $this->userlib->auth_menu();
				$this->load->view('route/search_blank', $data);
			}
		}
	}
	
	//страница маршрута
	public function view($id = null) {
		if($id != null) {
			$this->load->model('Routes_model');
			if($this->Routes_model->RouteActive($id)) {			
				$data = $this->Routes_model->get($id);
				$data['points'] = $this->Routes_model->getPoints($id);
				$data['form_login'] = $this->userlib->auth_menu();			
				$this->load->view('route/view', $data);
			} else {
				redirect(base_url() . '404');
			}
		}
		else {
			redirect(base_url());
		}
	}
	
	public function activeroute($id) {
		$this->load->model('Routes_model');
		$this->Routes_model->activeroute($id);
		redirect(base_url());	
	}

	public function all_bus() {
		$data['form_login'] = $this->userlib->auth_menu();
		$data['title'] = '
		<table class="table table-bordered table-striped" id="bus">  
		  <thead>
			<tr>
			  <th>Маршрутное такси</th>			 
			</tr>
		  </thead>
		';
		$data['head'] = "Все автобусные маршруты";
		$this->load->model('Routes_model');
		$config['base_url'] = base_url() . 'route/all_bus/';
		$config['total_rows'] = $this->Routes_model->cntRoutes(2, 1);
		$config['per_page'] = 10;
	
		$this->pagination->initialize($config);
		$data['routes'] = $this->Routes_model->getAllRoutes(2, 1, $config['per_page'],$this->uri->segment(3));
		$this->load->view('route/all', $data);
	}
	
	public function all_driver() {
		$data['form_login'] = $this->userlib->auth_menu();	
		$data['title'] = '
		<table class="table table-bordered table-striped" id="driver">  
		  <thead>
			<tr>
			  <th>Выезжающий транспорт</th>			 
			</tr>
		  </thead>
		';		
		$data['head'] = "Весь выезжающий транспорт";
		$this->load->model('Routes_model');
		$config['base_url'] = base_url() . 'route/all_driver/';
		$config['total_rows'] = $this->Routes_model->cntRoutes(2, null);
		$config['per_page'] = 10;
	
		$this->pagination->initialize($config);
		$data['routes'] = $this->Routes_model->getAllRoutes(2, null, $config['per_page'],$this->uri->segment(3));
		$this->load->view('route/all', $data);
	}
	
	public function all_passenger() {
		$data['form_login'] = $this->userlib->auth_menu();	
		$data['title'] = '
		<table class="table table-bordered table-striped" id="pass">  
		  <thead>
			<tr>
			  <th>Ищут водителя</th>			 
			</tr>
		  </thead>
		';		
		$data['head'] = "Все попутчики";
		$this->load->model('Routes_model');
		$config['base_url'] = base_url() . 'route/passenger/';
		$config['total_rows'] = $this->Routes_model->cntRoutes(1, null);
		$config['per_page'] = 10;
	
		$this->pagination->initialize($config);
		$data['routes'] = $this->Routes_model->getAllRoutes(1, null, $config['per_page'],$this->uri->segment(3));
		$this->load->view('route/all-pass', $data);
	}
        
        public function test()
        {
            print_r($_GET);         
        }
	
}