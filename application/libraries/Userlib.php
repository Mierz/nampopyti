<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* @author mieRz  
* @copyright 2013  
* 29.4.2013  
* Описание файла: Библиотека Пользователи  
*/

class Userlib {
	
	/* Генерация соли для пароля */
	function GenerateSalt($n = 3)	{
		$key = '';
		//присваюиваю набор символов которые использую в генерации
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVWXYZ.,*_-=+';
		//считаю количество симловов
		$counter = strlen($pattern)-1;
		//генерирую циклом
		for($i=0; $i<$n; $i++) {
			$key .= $pattern{rand(0,$counter)};
		}
		
		return $key;
	}
	
	/* Генерация кода востановления пароля */
	function GenerateKey($n = 10) {
		$key = '';
		//присваюиваю набор символов которые использую в генерации
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVWXYZ';
		//считаю количество симловов
		$counter = strlen($pattern)-1;
		//генерирую циклом
		for($i=0; $i<$n; $i++) {
			$key .= $pattern{rand(0,$counter)};
		}
		
		return $key;
	}
	
	public function hash_pass($pass, $salt)	{
		$CI =& get_instance();
		$CI->load->helper('security');
		return do_hash($pass . do_hash($salt, 'md5'), 'md5');
	}
	
	/* регистрация */
	public function reg($data) {	
		$CI =& get_instance();
		$CI->load->helper('security');
	
		//генерирую соль
		$salt = $this->GenerateSalt();
		
		//хеширую пароль
		$pass = $this->hash_pass($data['password'], $salt);
		
	    //создаю массив данных для таблици users
		$tbl_users = array('email'    => $data['email'],
						   'password' => $pass,
						   'salt'     => $salt
						   );
		
		//выполняю запрос с добавлением в таблицу users
		$CI->db->insert('users', $tbl_users);
		
		//получаю айди последнего запроса
		$id = $CI->db->insert_id();
            
        //создаю массив данных для таблици data_users		
		$tbl_data_users = array('id'      => $id,
								'name'    => $data['name'],
								'surname' => $data['surname'],
								'sex'     => $data['sex']);
				
		//выполняю запрос с добавлением в таблицу data_users
		$CI->db->insert('data_users', $tbl_data_users);
		
		$code = $this->GenerateKey();
		
		$tbl_activate = array(	'id'	=> $id,
								'code'	=> $code);
								
		$CI->db->insert('activate', $tbl_activate);		

		$msg = '<p>Здравствуйте, '.$data['name'].'!</p>
				<p>Для Вас создана учетная запись на сайте <a href="http://nampopyti.com/">nampopyti.com</a></p><br/>
				<p>Ваш логин: '.$data['email'].'</p>
				<p>Ваш пароль: '.$data['password'].'</p><br/>
				<p><b>ВАЖНО</b>: Для авторизации используйте email и пароль!</p><br/>
				<p>Для активации Вашей учетной записи пройдите по следующей ссылке:</p>
				<p><a href="http://nampopyti.com/user/activate/'.$code.'">Активировать аккаунт</a></p><br/>
				<p>Если у Вас возникли проблемы с активацией аккаунта, напишите нам, используя обратную связь на сайте.</p><br/>
				<p>С уважением,</p>
				<p>Администрация <a href="http://nampopyti.com">nampopyti.com</a></p>';		
		
		$this->send_mail($data['email'], 'Активация учетной записи', $msg);
		
		return true;
	}
	
	/* письмо на почту */
	public function send_mail($email, $title, $text) {
		$CI =& get_instance();
		$CI->load->helper('security');
		
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
			
		$CI->email->initialize($config);

		$CI->email->from('admin@nampopyti.com', 'Нам по пути');
		$CI->email->to($email); 
		
		$CI->email->subject($title);
		$CI->email->message($text);	

		$CI->email->send();
		
		return true;
	}
	
	/* авторизация */
	public function login($login, $pass, $no_save) {
		$CI =& get_instance();
		
		$result = TRUE;
		
		$CI->load->helper('cookie');
				
		if($query = $CI->db->get_where('users', array('email' => $login))) {
			foreach ($query->result() as $row) {			
				if($row->password == $this->hash_pass($pass, $row->salt) && $row->activate != null) {
					$newdata = array(
							'id'        => $row->id,
							'logged_in' => TRUE
						);
					
					$CI->session->set_userdata($newdata);	
					
					redirect(base_url());
				}
				else {
					$result = FALSE;
				}
			}
			$result = FALSE;
		}
		
		return $result;
	}
	
	public function firstLogin($login, $pass) {
		$CI =& get_instance();
		
		$result = TRUE;
		
		$CI->load->helper('cookie');
				
		if($query = $CI->db->get_where('users', array('email' => $login))) {
			foreach ($query->result() as $row) {			
				
				$newdata = array(
						'id'        => $row->id,
						'logged_in' => TRUE
					);
					
				$CI->session->set_userdata($newdata);	
				
			}
			$result = FALSE;
		}
		
		return $result;
	}
	
	/* личная информация */
	public function get($id) {
		$CI =& get_instance();
	
		$query = $CI->db->get_where('data_users', array('id' => $id));
		$town = "";
		
		foreach ($query->result() as $row) {		
			if($row->sex == 1) { 
				$sex = $CI->lang->line('female');
			}
			if($row->sex == 2) {
				$sex = $CI->lang->line('male');
			}
			
			$date = explode("-", $row->dob);
		
			$data = array('name'    => $row->name,
						  'surname' => $row->surname,
						  'd'     	=> $date[2],
						  'm'     	=> $date[1],
						  'y'     	=> $date[0],
						  'sex'     => $sex,
						  'town'    => $row->town,
						  'photo'   => $row->photo,
						  'car'     => $row->car,
						  'phone'	=> $row->phone,
						  'phone2'	=> $row->phone2,
						  'phone3'	=> $row->phone3,
						  'phone4'	=> $row->phone4,
						  'phone5'	=> $row->phone5,
						  );
		}
		
		
		
		return $data;
	}
	
	/* выход */
	public function logout() {
		$CI =& get_instance();
	
		//завершаю текущую сессию
		$CI->session->sess_destroy();
		
		//редирект на главную
		redirect(base_url());
	}
	
	public function lostpass($email) {
		$CI =& get_instance();
		
		$query = $CI->db->get_where('users', array('email' => $email));
		
		if($query->result()) {
			foreach ($query->result() as $row) {
				$id = $row->id;
			}
			
			$query = $CI->db->get_where('lost_user', array('id_user' => $id));
		
			if($query->result()) {
				foreach ($query->result() as $row) {
					$repeat = true;
				}
			}
			
			if($repeat == false) {			
				$key = $this->GenerateKey();
				
				//создаю массив данных для таблици lost_user
				$tbl_lost_user = array(	'id_user'    => $id,
										'code' => $key
										);
				
				//выполняю запрос с добавлением в таблицу lost_user
				$CI->db->insert('lost_user', $tbl_lost_user);	
				
				$msg = '<p>Ваш код:' . $key . '</p><p>Также можно подтвердить перейдя по ссылке: <a href="http://nampopyti.com/user/lostpassword/'.$key.'">http://nampopyti.com/user/lostpassword/'.$key.'</a></p>';
				
				$this->send_mail($email, 'Востановление доступа', $msg);
				
				$result = true;
			} else {
				$result = false;
			}
		}
		else {
			$result = false;
		}
		
		return $result;
	}
	
	public function lostsuc($code, $pass) {
		$CI =& get_instance();
		
		$query = $CI->db->get_where('lost_user', array('code' => $code));
		
		if($query->result()) {
			foreach ($query->result() as $row) {
					$id_user = $row->id_user;
			}
		}
		
		$CI->load->helper('security');
	
		//генерирую соль
		$salt = $this->GenerateSalt();
		
		//хеширую пароль
		$new_pass = $this->hash_pass($pass, $salt);
		
		$users = array(	'salt'		=> $salt,
						'password'	=> $new_pass
						);
				
		//выполняю запрос с добавлением в таблицу data_users
		$CI->db->where('id', $id_user);
		$CI->db->update('users', $users);
		
		$CI->db->delete('lost_user', array('id_user' => $id_user)); 
	
		return true;
	}
	
	public function getLostId($code) {
		$CI =& get_instance();
		$repeat = false;
		
		$query = $CI->db->get_where('lost_user', array('code' => $code));
		
		if($query->result()) {
			foreach ($query->result() as $row) {
					$repeat = true;
			}
		}
		
		return $repeat;
	}
	
	public function auth_menu()	{		
		$CI =& get_instance();

		if($CI->session->userdata('logged_in')) {			
			$menu = '<ul class="nav nav-pills nav-link">		
						<!--<li><a href="/route/search">'.$CI->lang->line('search').'</a></li>-->
						<li><a href="/user/profile/'.$CI->session->userdata('id').'">'.$CI->lang->line('profile').'</a> </li>
						<li><a href="/board/">Объявления</a></li>
						<li data-toggle="dropdown"><a href="/msg/">Сообщения</a> </li>                                                
						<li><span class="badge" style="margin-top:7px;">'.$this->cnt_msg($CI->session->userdata('id')).'</span></li>
						<li><a href="/user/logout">Выйти</a></li>                                               
					</ul>';
                        /*
                         *  <li class="dropdown val-links" id="accountmenu">  
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="/img/ru-icon.png">&nbsp;<b><span class=rouble>Р</span></b><b class="caret"></b></a>  
                                                    <ul class="dropdown-menu val-links">
                                                        <li class="divider"></li>
                                                        <li style="padding-left:10px;color:#999">Выберите язык</li>
                                                        <li><a href="#"><img src="/img/ru-icon.png"> Русский</a></li>  
                                                        <li><a href="#"><img src="/img/ua-icon.png"> Українська</a></li>                                                          
                                                        <li class="divider"></li>  
                                                        <li style="padding-left:10px;color:#999;">Выберите валюту</li>
                                                        <li><a href="#"><b>&#8372;</b> UAH</a></li>  
                                                        <li><a href="#"><b><span class=rouble>Р</span></b> RUB</a></li>  
                                                    </ul>  
                                                </li>  
                         */
		}
		else {
			$menu = '<ul class="nav nav-pills nav-link">	
						<!--<li><a href="/route/search">'.$CI->lang->line('search').'</a></li>-->
						<li><a href="/user/join">Присоединится</a></li>
						<li><a href="#login-form" role="button" data-toggle="modal">Войти</a></li>
					</ul>';
		}		
		
		return $menu;
	}
	
	public function cnt_msg($id) {
		$CI =& get_instance();	
		
		$query = $CI->db->get_where('msg', array('to' => $id, 'read' => null));
		$cnt = 0;
		if($query->result()) {
			foreach ($query->result() as $row) {
				$cnt++;
			}
		}
		
		return $cnt;
	}
	
	public function edit($data)	{
		$CI =& get_instance();		

		$id = $data['id'];
            
        //создаю массив данных для таблици data_users		
		$tbl_data_users = array('name'    	=> $data['name'],
								'surname' 	=> $data['surname'],
								'town' 		=> $data['town'],
								'dob'     	=> $data['dob'],
								'car'    	=> $data['car'],
								'phone'		=> $data['phone']
								);
								
		if(isset($data['phone2'])) {
			$phone2 = array('phone2' => $data['phone2']);
			$tbl_data_users = $tbl_data_users + $phone2;
		}
		
		if(isset($data['phone3'])) {
			$phone3 = array('phone3' => $data['phone3']);
			$tbl_data_users = $tbl_data_users + $phone3;
		}
		
		if(isset($data['phone4'])) {
			$phone4 = array('phone4' => $data['phone4']);
			$tbl_data_users = $tbl_data_users + $phone4;
		}
		
		if(isset($data['phone5'])) {
			$phone5 = array('phone5' => $data['phone5']);
			$tbl_data_users = $tbl_data_users + $phone5;
		}			
		
		//выполняю запрос с добавлением в таблицу data_users
		$CI->db->where('id', $id);
		$CI->db->update('data_users', $tbl_data_users);
		
		return true;
	}
	
	public function save_photo_db($id, $name)
	{
		$CI =& get_instance();		
            
        //создаю массив данных для таблици data_users		
		$tbl_data_users = array('photo'    => '/uploads/avatars/' . $name
								);
				
		//выполняю запрос с добавлением в таблицу data_users
		$CI->db->where('id', $id);
		$CI->db->update('data_users', $tbl_data_users);
		
		return true;
	}

	public function activate($code) {
		$CI =& get_instance();		
		
		$query = $CI->db->get_where('activate', array('code' => $code));
		$result = "";
		
		if($query->result()) {
			foreach ($query->result() as $row) {
				$id_user = $row->id;
			}
			
			$tbl_users = array('activate'    => '1');
			
			$CI->db->where('id', $id_user);
			$CI->db->update('users', $tbl_users);
			
			$CI->db->delete('activate', array('id' => $id_user)); 
			
			$result = true;
			
			$query = $CI->db->get_where('users', array('id' => $id_user));
						
			if($query->result()) {
				foreach ($query->result() as $row) {					
					$this->firstLogin($row->email, $row->password);
				}
			}
			
			}
		else {
			$result = false;
		}
		
		return $result; 
	}
	
	public function get_user($id) {
		$CI =& get_instance();
		$query = $CI->db->get_where('users', array('id' => $id));
		$result = false;
		
		if($query->result()) {
			$result = true;
		}
	
		return $result;
	}
	
	public function getUserMail($id) {
		$CI =& get_instance();
		$query = $CI->db->get_where('users', array('id' => $id));
		$result = null;
		
		if($query->result()) {
			foreach ($query->result() as $row) {
				$result = $row->email;
			}
		}
	
		return $result;
	}
	
	public function auth_vk() {
		$client_id = '3815398'; // ID приложения
		$client_secret = 'WtFJctP6AhEjc9Pz8kq2'; // Защищённый ключ
		$redirect_uri = 'http://nampopyti.com/user/auth/vk'; // Адрес сайта

		$url = 'http://oauth.vk.com/authorize';

		$params = array(
			'client_id'     => $client_id,
			'redirect_uri'  => $redirect_uri,
			'response_type' => 'code'
		);
		
		$link = $url . '?' . urldecode(http_build_query($params));
			
		if(!isset($_GET['code'])) {
			redirect($link);
		}
		
		if (isset($_GET['code'])) {
			$result = false;
			$params = array(
				'client_id' => $client_id,
				'client_secret' => $client_secret,
				'code' => $_GET['code'],
				'redirect_uri' => $redirect_uri
			);

			$token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

			if (isset($token['access_token'])) {
				$params = array(
					'uids'         => $token['user_id'],
					'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
					'access_token' => $token['access_token']
				);

				$userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
				if (isset($userInfo['response'][0]['uid'])) {
					$userInfo = $userInfo['response'][0];
					$result = true;
				}
			}

			if ($result) {
				$CI =& get_instance();
				$login = "vk_" . $userInfo['uid'];
				$query = $CI->db->get_where('users', array('social' => $login));
									
				if($query->result()) {
					foreach ($query->result() as $row) {
						$this->socialAuth($row->id);
					}					
				} else {
					$users = array('social'	=> $login);
									
					$CI->db->insert('users', $users);
					
					$id = $CI->db->insert_id();
									
					$dob = explode(".", $userInfo['bdate']);
					$end_dob = $dob[2] . "-" . $dob[1] . "-" . $dob[0]; 
					
					$data = array(	'name'		=> $userInfo['first_name'],
									'surname' 	=> $userInfo['last_name'],
									'sex' 		=> $userInfo['sex'],
									'dob'		=> $end_dob,
									'photo' 	=> $userInfo['photo_big'],
									'id'		=> $id
									);
									
					$CI->db->insert('data_users', $data);

					$this->socialAuth($id);
				}
			}
		}
		
	}
		
	public function auth_facebook() {
		$client_id = '1409926919219780'; // Client ID
		$client_secret = 'e95f082b6f5dddf346e70835e16ed295'; // Client secret
		$redirect_uri = 'http://nampopyti.com/user/auth/facebook'; // Redirect URIs

		$url = 'https://www.facebook.com/dialog/oauth';

		$params = array(
			'client_id'     => $client_id,
			'redirect_uri'  => $redirect_uri,
			'response_type' => 'code',
			'scope'         => 'email,user_birthday'
		);
		
		$link = $url . '?' . urldecode(http_build_query($params));
		
		if(!isset($_GET['code'])) {
			redirect($link);
		}
		
		if (isset($_GET['code'])) {
			$result = false;

			$params = array(
				'client_id'     => $client_id,
				'redirect_uri'  => $redirect_uri,
				'client_secret' => $client_secret,
				'code'          => $_GET['code']
			);

			$url = 'https://graph.facebook.com/oauth/access_token';

			$tokenInfo = null;
			parse_str(file_get_contents($url . '?' . http_build_query($params)), $tokenInfo);

			if (count($tokenInfo) > 0 && isset($tokenInfo['access_token'])) {
				$params = array('access_token' => $tokenInfo['access_token']);

				$userInfo = json_decode(file_get_contents('https://graph.facebook.com/me' . '?' . urldecode(http_build_query($params))), true);

				if (isset($userInfo['id'])) {
					$userInfo = $userInfo;
					$result = true;
				}
			}

			if ($result) {
				$CI =& get_instance();
				$login = "facebook_" . $userInfo['id'];
				$query = $CI->db->get_where('users', array('social' => $login));
									
				if($query->result()) {
					foreach ($query->result() as $row) {
						$this->socialAuth($row->id);
					}
				} else {
					$users = array(	'social'	=> $login,
									'email'		=> $userInfo['email']
									);				
									
					$CI->db->insert('users', $users);
					
					$id = $CI->db->insert_id();
					
					$name = explode(" ", $userInfo['name']);									
					$dob = explode("/", $userInfo['birthday']);					
					$sex = null;
					if($userInfo['gender'] == 'male') {
						$sex = 2;
					}
					if($userInfo['gender'] == 'female') {
						$sex = 1;
					}
					
					$end_dob = $dob[2] . "-" . $dob[0] . "-" . $dob[1]; 
					
					$data = array(	'name'		=> $name[0],
									'surname' 	=> $name[1],
									'sex' 		=> $sex,
									'dob'		=> $end_dob,
									'photo' 	=> 'http://graph.facebook.com/' . $userInfo['username'] . '/picture?type=large',
									'id'		=> $id
									);
							
					$CI->db->insert('data_users', $data);	

					$this->socialAuth($id);
				}			
			}

		}
	}
	
	public function socialAuth($id) {
		$CI =& get_instance();
		
		$newdata = array(
							'id'        => $id,
							'logged_in' => TRUE
						);
					
		$CI->session->set_userdata($newdata);	
		
		//redirect(base_url() . 'user/test');
						
		redirect(base_url());
	}
	
	public function changePhoto ($id) {
		$CI =& get_instance();
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $iWidth = $iHeight = 150; // desired image result dimensions
        $iJpgQuality = 90;

        if ($_FILES) {

            // if no errors and size less than 250kb
            if (! $_FILES['image_file']['error'] && $_FILES['image_file']['size'] < 250 * 1024) {
                if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {

                    // new unique filename			
					$hash = md5(time().rand());
                    $sTempFileName = './uploads/avatars/' . $hash;

                    // move uploaded file into cache folder
                    move_uploaded_file($_FILES['image_file']['tmp_name'], $sTempFileName);

                    // change file permission to 644
                    @chmod($sTempFileName, 0644);

                    if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                        $aSize = getimagesize($sTempFileName); // try to obtain image info
                        if (!$aSize) {
                            @unlink($sTempFileName);
                            return;
                        }

                        // check for image type
                        switch($aSize[2]) {
                            case IMAGETYPE_JPEG:
                                $sExt = '.jpg';

                                // create a new image from file 
                                $vImg = @imagecreatefromjpeg($sTempFileName);
                                break;
                            /*case IMAGETYPE_GIF:
                                $sExt = '.gif';

                                // create a new image from file 
                                $vImg = @imagecreatefromgif($sTempFileName);
                                break;*/
                            case IMAGETYPE_PNG:
                                $sExt = '.png';

                                // create a new image from file 
                                $vImg = @imagecreatefrompng($sTempFileName);
                                break;
                            default:
                                @unlink($sTempFileName);
                                return;
                        }

                        // create a new true color image
                        $vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );

                        // copy and resize part of an image with resampling
                        imagecopyresampled($vDstImg, $vImg, 0, 0, (int)$_POST['x1'], (int)$_POST['y1'], $iWidth, $iHeight, (int)$_POST['w'], (int)$_POST['h']);

                        // define a result image filename
                        $sResultFileName = $sTempFileName . $sExt;

                        // output image to file
                        imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                        @unlink($sTempFileName);
						
						$link_photo = "http://nampopyti.com/uploads/avatars/" . $hash . $sExt;
						
						$photo = array('photo' => $link_photo);
				
						$CI->db->where('id', $id);
						$CI->db->update('data_users', $photo);

                        return $sResultFileName;
                    }
                }
            }
        }
    }
	}
	
	public function checkEmail($userID)
	{
		$CI =& get_instance();
		$result = null;
		$query = $CI->db->get_where('users', array('id' => $userID));

		foreach ($query->result() as $row)
		{
			if($row->email != null) {
				$result = false;
			} else {
				$result = true;
			}	
		}
		
		return $result;
	}
	
	public function checkPhone($userID)
	{
		$CI =& get_instance();
		$result = null;
		$query = $CI->db->get_where('data_users', array('id' => $userID));

		foreach ($query->result() as $row)
		{
			if($row->phone != null) {
				$result = false;
			} else {
				$result = true;
			}	
		}
		
		return $result;
	}
}