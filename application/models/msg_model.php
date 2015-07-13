<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msg_model extends CI_Model
{
	public function write($to, $from, $title, $text) {
		//создаю массив данных для таблици users
		$tbl_routes = array('to'    => $to,
							'from' 	=> $from,
							'title'	=> $title,
							'text' 	=> $text,
							'date'	=> date('Y-m-d'),
							'time'	=> date('H:i:s')
						   );
						   
		$email = $this->userlib->getUserMail($to);
		   
		$msg = '<p>На сайте <a href="http://nampopyti.com/">nampopyti.com</a></p>
				<p>Вам пришло личное сообщение!</p>
				<p>Прочтите его!</p>';
						   
		$this->userlib->send_mail($email, 'Получено личное сообщение', $msg);
				
		//выполняю запрос с добавлением в таблицу users
		$this->db->insert('msg', $tbl_routes);
		
		return TRUE;
	}
	
	public function getId($id) {
		$result = null;
		if($query = $this->db->get_where('msg', array('id' => $id)))
		{			 
			foreach ($query->result() as $row)
			{
				$result = $row->to;
			}
		}
		
		return $result;
	}
	
	public function get_list($num, $offset) {	
		$data = null;
		$this->db->order_by("id", "desc");
		$this->db->where('to', $this->session->userdata('id'));
	
		if($query = $this->db->get('msg', $num, $offset))
		{			 
			foreach ($query->result() as $row)
			{			
				$dataUser = $this->getUserName($row->from);
				
				$data[] = array('from'		=> $row->from,
								'text' 		=> $row->text,
								'title'		=> $row->title,
								'read'  	=> $row->read,
								'name'		=> $dataUser['name'],
								'surname'	=> $dataUser['surname'],
								'date'		=> $row->date,
								'time'		=> $row->time,
								'id'		=> $row->id);
			}
		}
		
		return $data;
	}
	
	public function getCount($id) {
		$i = 0;
		if($query = $this->db->get_where('msg', array('to' => $id)))
		{			 
			foreach ($query->result() as $row)
			{			
				$i++;
			}
		}
		
		return $i;
	}
	
	public function getUserName($id) {
		$data = "";
		if($query = $this->db->get_where('data_users', array('id' => $id)))
		{			 
			foreach ($query->result() as $row) {	
				$data = array(	'name'		=> $row->name,
								'surname'	=> $row->surname,
								'photo'		=> $row->photo);
			}
		}
		
		return $data;
	}
	
	public function view($id) {
		$data = null;
		if($query = $this->db->get_where('msg', array('id' => $id)))
		{
			foreach ($query->result() as $row) {	
				$dataUser = $this->getUserName($row->from);
				
				$tmp = explode("-", $row->date);	
				$date = $tmp['2'] . '-' . $tmp['1'] . '-' . $tmp['0'];
				
				$data[] = array('from'		=> $row->from,
								'text' 		=> $row->text,
								'title'		=> $row->title,
								'read'  	=> $row->read,
								'name'		=> $dataUser['name'],
								'surname'	=> $dataUser['surname'],
								'photo'		=> $dataUser['photo'],
								'date'		=> $date,
								'time'		=> $row->time,
								'from'		=> $row->from,
								'id'		=> $row->id
								);
			}
		}
		return $data;
	}
	
	public function read($id) {
		$tbl_msg = array('read'	=> '1');
	
		$this->db->where('id', $id);
		$this->db->update('msg', $tbl_msg);
	
		return true;
	}
	
	public function delete($id) {
		$this->db->delete('msg', array('id' => $id)); 
		
		return true;
	}

}