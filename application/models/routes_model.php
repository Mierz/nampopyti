<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Routes_model extends CI_Model
{	
	public function add($data, $points = null, $shelude = null) {
		$this->db->insert('routes', $data);
		
		$id_route = $this->db->insert_id();
		
		if($points != null) {			
			$id = array('id' 	=> $id_route,
						'from'	=> $data['from']);
			$points = $id + $points;
									
			$this->db->insert('route_points', $points);
		}
		
		if($shelude != null) {
			$data_shelude = array(	'id' 		=> $id_route,
									'shelude'	=> $shelude);
									
			$this->db->insert('route_shelude', $data_shelude);
		}
						
		if($data['group_id'] == 1) {
			$time = null;
			$p_msg = null;
			if(isset($data['departure_h'])) {
				$time = "<p><b>Время отпрлавления:</b> " . $data['departure_h'] . ":" . $data['departure_m'] . " +/- " . $data['departure_lapse'] .  "</p>";
			}
			if(isset($points['p1'])) {
				$p_msg .= "<p>".$points['p1']."</p>";
			}
			if(isset($points['p2'])) {
				$p_msg .= "<p>".$points['p2']."</p>";
			}
			if(isset($points['p3'])) {
				$p_msg .= "<p>".$points['p3']."</p>";
			}
			if(isset($points['p4'])) {
				$p_msg .= "<p>".$points['p4']."</p>";
			}
			if(isset($points['p5'])) {
				$p_msg .= "<p>".$points['p5']."</p>";
			}
			if(isset($points['p6'])) {
				$p_msg .= "<p>".$points['p6']."</p>";
			}
			$msg = '<h1>Маршрут: ' . $data['from'] . ' &rarr; ' . $data['to'] . '</h1>
					<hr>
					<p><b>Промежуточные адреса:</b></p>
					'.$p_msg.'
					<p><b>Количество пассажиров:</b> '.$data['seats'].'</p>
					<p><b>Дата отправления:</b> '.$data['date'].'</p>
					'.$time.'
					<br><p><a href="http://nampopyti.com/route/activeroute/'.$id_route.'">Опубликовать</a></p>
					';
		}
		
		if($data['group_id'] == 2) {
			$time = null;
			$time_return = null;
			$date = null;
			$p_msg = null;
			$reg = null;
			$comment = null;
			if(isset($data['departure_h'])) {
				$time = "<p><b>Время отправления:</b> " . $data['departure_h'] . ":" . $data['departure_m'] . " +/- " . $data['departure_lapse'] .  "</p>";
			}
			if(isset($data['date_return'])) {
				$date = "<p><b>Дата возвращения:</b> " . $data['date_return'] . "</p>";
			}
			if(isset($data['hour_return'])) {
				$time_return = "<p><b>Время возвращения:</b> " . $data['return_h'] . ":" . $data['return_m'] . " +/- " . $data['return_lapse'] .  "</p>";
			}
			if(isset($data['comment'])) {
				$time_return = "<p><b>Комментарий водителя:</b></p><p> " . $data['comment']. "</p>";
			}
			if(isset($points['p1'])) {
				$p_msg .= "<p>".$points['p1']."</p>";
			}
			if(isset($points['p2'])) {
				$p_msg .= "<p>".$points['p2']."</p>";
			}
			if(isset($points['p3'])) {
				$p_msg .= "<p>".$points['p3']."</p>";
			}
			if(isset($points['p4'])) {
				$p_msg .= "<p>".$points['p4']."</p>";
			}
			if(isset($points['p5'])) {
				$p_msg .= "<p>".$points['p5']."</p>";
			}
			if(isset($points['p6'])) {
				$p_msg .= "<p>".$points['p6']."</p>";
			}
			if(isset($data['const'])) {
				$reg = "<p><b>Маршрутное такси:</b> Да</p>";
			} else {
				$reg = "<p><b>Маршрутное такси:</b> Нет</p>";
			}
			$msg = '<h1>Маршрут: ' . $data['from'] . ' &rarr; ' . $data['to'] . '</h1>
					<hr>
					<p><b>Промежуточные адреса:</b></p>
					'.$p_msg.'
					<p><b>Количество пассажиров:</b> '.$data['seats'].'</p>
					<p><b>Цена за место:</b> '.$data['price'].' грн.</p>
					<p><b>Автомобиль:</b> '.$data['car'].'</p>
					<p><b>Точка отправления:</b> '.$data['pos'].'</p>
					<p><b>Точка прибытия:</b> '.$data['poa'].'</p>
					<p><b>Дата отправления:</b> '.$data['date'].'</p>
					'.$time.'
					'.$date.'
					'.$time_return.'
					'.$reg.'
					<br><p><a href="http://nampopyti.com/route/activeroute/'.$id_route.'">Опубликовать</a></p>
					';
		}			
						   
		$this->userlib->send_mail('admin@nampopyti.com', 'Было опубликовано новое объявление', $msg);
				
		return true;
	}
	
	public function edit($id, $data, $points = null, $shelude = null) {		
		$this->db->where('id', $id);
		$this->db->update('routes', $data);	

		if($points != null) {			
			$query = $this->db->get_where('route_points', array('id' => $id, 'active' => '1'));
		
			if($query->result()) {
				$id_new = array('from'	=> $data['from']);
				$points = $id_new + $points;
							
				$this->db->where('id', $id);
				$this->db->update('route_points', $points);
			} else {
				$id = array('id' 		=> $id,
							'from'		=> $data['from'],
							'active'	=> '1');
				$points = $id + $points;
										
				$this->db->insert('route_points', $points);
			}
		}

		if($shelude != null) {
			$query = $this->db->get_where('route_shelude', array('id' => $id));
		
			if($query->result()) {
				$data_shelude = array('shelude'	=> $shelude);
				$this->db->update('route_shelude', $data_shelude);
			} else {
				$data_shelude = array(	'id' 		=> $id,
										'shelude'	=> $shelude);
									
				$this->db->insert('route_shelude', $data_shelude);
			}
		}		
		
		return true;
	}
	
	public function view($id, $const = null) {
		$data = null;
		$this->db->order_by("id", "desc");
		if(!$const) {
			$this->db->limit(10);
		}
		else {
			$this->db->limit(6);
		}
		$date = null;
		
		if($const == true) { $query = $this->db->get_where('routes', array('group_id' => $id, 'const' => '1', 'active' => '1')); }
		else { $query = $this->db->get_where('routes', array('group_id' => $id, 'const' => null, 'active' => '1')); }
		
                $this->db->cache_on();
                
		if($query)
		{			 
			foreach ($query->result() as $row)
			{	
				$userData = $this->getUserData($row->author);	
				
				$tmp = explode("-", $row->date);	
				$date = $tmp['2'] . '-' . $tmp['1'] . '-' . $tmp['0'];
				
				$data[] = array('id' 				=> $row->id,
								'to' 				=> $row->to,
								'from' 				=> $row->from,
								'date' 				=> $date,
								'price' 			=> $row->price,								
								'seats' 			=> $row->seats,
								'departure_h'		=> $row->departure_h,
								'departure_m'		=> $row->departure_m,
								'departure_lapse'	=> $row->departure_lapse,
								'photo'				=> $userData['avatar'],
								'poa'				=> $row->poa,
								'pos'				=> $row->pos,
								'author'			=> $row->author
								);
			}
		}
		
		return $data;
	}
	
	public function search_route($from, $to, $type = null, $date = null, $seats = null) {
		$data = null;
		$cnt = 0;
		$search = array('from' => $from, 'to' => $to, 'active' => '1');
		
		//к массиву параметром добавлением значение типа
		if($type != null && $type != 0) {
			$params = array('group_id' => $type);
			$search = $search + $params;
		}
		
		//к массиву параметром добавлением количество мест
		if($seats != null && $seats != 0) {
			$params = array('seats' => $seats);
			$search = $search + $params;
		}
		
		//к массиву параметром добавлением дату
		if($date != null) {
			$params = array('date' => $date);
			$search = $search + $params;
		}
		
		$this->db->order_by("date", "desc");
		if($query = $this->db->get_where('routes', $search))
		{ 
			foreach ($query->result() as $row)
			{
				$data[] = array('id' 			=> $row->id,
								'to' 			=> $row->to,
								'group_id'		=> $row->group_id,
								'from' 			=> $row->from,
								'date' 			=> $row->date,
								'price' 		=> $row->price,
								'date_return'	=> $row->date_return,
								'car' 			=> $row->car,
								'seats' 		=> $row->seats,
								'author' 		=> $row->author,
								'pos' 			=> $row->pos,
								'poa' 			=> $row->poa,
								'const'			=> $row->const,
								'result'		=> $cnt);
				$cnt++;
			}
		}
				
		if(!$data) {
			$id = null;
			$this->db->select('id');
			$search = "from = '{$from}' AND p1 = '{$to}' OR p2 = '{$to}' AND active = '1'";
			$this->db->where($search);
			$this->db->from('route_points');
					
			if($query = $this->db->get()) {
				foreach ($query->result() as $row) {
					$id = $row->id;
					
					$search = array('id' => $id);
					$this->db->order_by("date", "desc");
					if($query = $this->db->get_where('routes', $search))
					{ 
						foreach ($query->result() as $row)
						{	
							$data[] = array('id' 			=> $row->id,
											'to' 			=> $row->to,
											'group_id'		=> $row->group_id,
											'from' 			=> $row->from,
											'date' 			=> $row->date,
											'price' 		=> $row->price,
											'date_return'	=> $row->date_return,
											'car' 			=> $row->car,
											'seats' 		=> $row->seats,
											'author' 		=> $row->author,
											'pos' 			=> $row->pos,
											'poa' 			=> $row->poa,
											'result'		=> $cnt);
						}
					}
				}
			}			
		}
		
		return $data;
	}
	
	public function getUserData($id) {
		$data = null;
                
                $this->db->cache_on();
                
		$query = $this->db->get_where('data_users', array('id' => $id));
		
		foreach ($query->result() as $row)
		{
			$data = array(	'name' 		=> $row->name,
							'surname'	=> $row->surname,
							'car'		=> $row->car,
							'dob'		=> $this->calculate_age($row->dob),
							'avatar'	=> $row->photo,
							'phone'		=> $row->phone,
							'phone2'	=> $row->phone2,
							'phone3'	=> $row->phone3,
							'phone4'	=> $row->phone4,
							'phone5'	=> $row->phone5
							);
		}
		
		return $data;
	}
	
	public function calculate_age($birthday) {		
		$birthday_timestamp = strtotime($birthday);
		$age = date('Y') - date('Y', $birthday_timestamp);
		if (date('md', $birthday_timestamp) > date('md')) {
			$age--;
		}
		if($age == date('Y')) {
			$age = null;
		}		
		
		return $age;
	}
	
	public function get($id) {		
		$data = null;
                
                $this->db->cache_on();
                
		$query = $this->db->get_where('routes', array('id' => $id, 'active' => '1'));
		
		foreach ($query->result() as $row)
		{	
			$userData = $this->getUserData($row->author);

			$shelude = $this->getShelude($row->id);
			
			$tmp = explode("-", $row->date);	
			$date = $tmp['2'] . '-' . $tmp['1'] . '-' . $tmp['0'];
			
			if($row->date_return) {
			$tmp2 = explode("-", $row->date_return);	
			$date_return = $tmp2['2'] . '-' . $tmp2['1'] . '-' . $tmp2['0'];
			} else {
				$date_return = null;
			}
						
			$data = array(	'id' 				=> $row->id,
							'to'    			=> $row->to,
							'from' 				=> $row->from,
							'date'     			=> $date,
							'price' 			=> $row->price,
							'comment' 			=> $row->comment,
							'seats' 			=> $row->seats,
							'group' 			=> $row->group_id,
							'author'			=> $row->author,
							'pos' 				=> $row->pos,
							'poa' 				=> $row->poa,
							'date_return' 		=> $date_return,
							'departure_h'		=> $row->departure_h,
							'departure_m'		=> $row->departure_m,
							'departure_lapse'	=> $row->departure_lapse,
							'return_h'			=> $row->return_h,
							'return_m'			=> $row->return_m,
							'return_lapse'		=> $row->return_lapse,
							'name'				=> $userData['name'],
							'surname'			=> $userData['surname'],
							'car'				=> $userData['car'],
							'age'				=> $userData['dob'],
							'avatar'			=> $userData['avatar'],
							'phone'				=> $userData['phone'],
							'phone2'			=> $userData['phone2'],
							'phone3'			=> $userData['phone3'],
							'phone4'			=> $userData['phone4'],
							'phone5'			=> $userData['phone5'],
							'shelude'			=> $shelude,
							'bus'				=> $row->const
						  );
		}
		
		return $data;
	}
	
	public function getPoints($id) {
                $this->db->cache_on();
            
		$query = $this->db->get_where('route_points', array('id' => $id, 'active' => '1'));
		
		$data = null;
		
		if($query->result()) {
			foreach ($query->result() as $row)
			{
				$data[] = array('p1' => $row->p1,
								'p2' => $row->p2,
								'p3' => $row->p3,
								'p4' => $row->p4,
								'p5' => $row->p5,
								'p6' => $row->p6
							  );
			}
		}
		
		return $data;
	}
	
	public function getUserRoutes($id) {
                $this->db->cache_on();
		$this->db->order_by("id", "desc");
		$this->db->limit(10);
		$query = $this->db->get_where('routes', array('author' => $id, 'active' => '1'));
		$data = null;
		foreach ($query->result() as $row)
		{			
			$data[] = array('id' 	=> $row->id,
							'to'    => $row->to,
							'from' 	=> $row->from,
							'date'	=> $row->date
						  );
		}
		
		return $data;
	}
	
	public function cntUserRoutes($id) {
		$query = $this->db->get_where('routes', array('author' => $id, 'active' => '1'));
		$i = 0;
		foreach ($query->result() as $row)
		{			
			$i++;
		}
		
		return $i;
	}
	
	public function getBoards($num, $offset) {
                $this->db->cache_on();
		$this->db->order_by('id','desc');
		$this->db->where('author', $this->session->userdata('id'));
		$search = "active = '1'";
		$this->db->where($search);
		$query = $this->db->get('routes',$num, $offset);
		return $query->result_array();
	}
	
	public function activeRoute($id)	{
		$data = array('active' => 1);
				
		$this->db->where('id', $id);
		$this->db->update('routes', $data);
		$this->db->update('route_points', $data);
		
		$author = null;
		$query = $this->db->get_where('routes', array('id' => $id, 'active' => '1'));
		foreach ($query->result() as $row)
		{	
			$author = $row->author;
		}
		$email = $this->userlib->getUserMail($author);
		   
		$msg = '<p>Ваше объявление опубликованое на сайте <a href="http://nampopyti.com/">nampopyti.com</a> одобрено!</p>
				<p>Оно доступно по адресу: <a href="http://nampopyti.com/route/view/'.$id.'">http://nampopyti.com/route/view/'.$id.'</a></p>';
						   
		$this->userlib->send_mail($email, 'Объявление опубликовано', $msg);
		
		return true;
	}
	
	public function getId($id) {
		$result = null;
		if($query = $this->db->get_where('routes', array('id' => $id)))
		{			 
			foreach ($query->result() as $row)
			{
				$result = $row->author;
			}
		}
		
		return $result;
	}
	
	public function getGroup($id) {
		$result = null;
		if($query = $this->db->get_where('routes', array('id' => $id)))
		{			 
			foreach ($query->result() as $row)
			{
				$result = $row->group_id;
			}
		}
		
		return $result;
	}
	
	public function getConst($id) {
		$result = null;
		if($query = $this->db->get_where('routes', array('id' => $id)))
		{			 
			foreach ($query->result() as $row)
			{
				$result = $row->const;
			}
		}
		
		return $result;
	}
	
	public function busEdit() {
		if($query = $this->db->get_where('routes', array('const' => 1)))
		{			 
			foreach ($query->result() as $row)
			{
				$routes = array('date'	=> date('Y-m-d'),
								'const'	=> 1);
								
				$this->db->where('id', $row->id);
				$this->db->update('routes', $routes);
			}
			
		}		
	}
	
	public function getShelude($id) {
		$query = $this->db->get_where('route_shelude', array('id' => $id));
		$data = null;		
		foreach ($query->result() as $row)
		{	
			$shelude = explode(",", $row->shelude); 
			for($i = 0; $i < count($shelude); $i++) {
				$data[$i] = $shelude[$i];
			}
		}
		
		return $data;
	}
	
	public function delete($id) {
		$this->db->delete('routes', array('id' => $id)); 
		$this->db->delete('route_points', array('id' => $id)); 
		$this->db->delete('route_shelude', array('id' => $id)); 
		
		return true;
	}
	
	public function getEditData($id) {
		$data = null;
		$query = $this->db->get_where('routes', array('id' => $id));
		
		foreach ($query->result() as $row)
		{
			$points		 = $this->getPoints($row->id);
			$shelude	 = $this->getShelude($row->id);
			
			$data = array(	'from' 		=> $row->from,
							'to'		=> $row->to,
							'seats'		=> $row->seats,
							'price'		=> $row->price,
							'pos'		=> $row->pos,
							'poa'		=> $row->poa,
							'comment'	=> $row->comment,
							'p1'		=> $points[0]['p1'],
							'p2'		=> $points[0]['p2'],
							'p3'		=> $points[0]['p3'],
							'p4'		=> $points[0]['p4'],
							'p5'		=> $points[0]['p5'],
							'p6'		=> $points[0]['p6'],
							'shelude'	=> $shelude
							);
		}
		
		return $data;
	}
	
	public function RouteActive($id) {
		$query = $this->db->get_where('routes', array('id' => $id, 'active' => '1'));
		
		$data = null;
		
		if($query->result()) {
			$data = true;
		}
		
		return $data;
	}
	
	public function getAllRoutes($id, $const = null, $num, $offset) {
		$data = null;
		
                $this->db->cache_on();
                
                $this->db->order_by("id", "desc");
		$date = null;
		
		if($const == true) { 
			$where = array('group_id' => $id, 'const' => '1', 'active' => '1');
			$this->db->where($where);
		}
		else {
			$where = array('group_id' => $id, 'const' => null, 'active' => '1');
			$this->db->where($where);
		}
	
		$query = $this->db->get('routes',$num, $offset);
				
		if($query)
		{			 
			foreach ($query->result() as $row)
			{	
				$userData = $this->getUserData($row->author);
				
				$data[] = array('id' 				=> $row->id,
								'to' 				=> $row->to,
								'from' 				=> $row->from,
								'date' 				=> $row->date,
								'price' 			=> $row->price,								
								'seats' 			=> $row->seats,
								'departure_h'		=> $row->departure_h,
								'departure_m'		=> $row->departure_m,
								'departure_lapse'	=> $row->departure_lapse,
								'photo'				=> $userData['avatar'],
								'poa'				=> $row->poa,
								'pos'				=> $row->pos,
								'author'			=> $row->author
								);
			}
		}
		
		return $data;
	}
	
	public function cntRoutes($id, $const) {		
		$query = $this->db->get_where('routes', array('group_id' => $id, 'date' => date('Y-m-d'), 'const' => $const, 'active' => '1'));
		$i = 0;
		foreach ($query->result() as $row)
		{			
			$i++;
		}
		
		return $i;
	}
	
}