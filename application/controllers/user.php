<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @author mieRz  
* @copyright 2013  
* 22.4.2013  
* Описание файла: Контроллер Пользователи  
*/ 

class User extends CI_Controller {
	
	/* Авторизация */
	public function login()
	{		
		//проверить активная ли сессия
		if(!$this->session->userdata('logged_in'))
		{
			//стиль сообщение об ошибке
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			//текст сообщений с ошибками
			$this->form_validation->set_message('required', 'Поле "%s" не заполнено!');
			$this->form_validation->set_message('valid_email', '%s указана не верно!');
			
			//успешна ли валидация
			if ($this->form_validation->run('login') == FALSE)
			{
				$data['form_login'] = $this->userlib->auth_menu();
				//показываю страницу с формой регистрации
				$this->load->view('user/login', $data);
			}
			else
			{	
				if(!$this->userlib->login($this->input->post('email'), $this->input->post('password'), $this->input->post('no_save')))
				{
					 $data['msg'] = '<div class="error">Почта или пароль не верный!</div>';
					 $this->load->view('user/login', $data);
				}
			}	
		}
		else
		{
			redirect(base_url());
		}
	}
	
	/* Регистрация */
	public function join()
	{		
		//показывать форму авторизации если сессия не активная
		if(!$this->session->userdata('logged_in'))
		{
			//успешна ли валидация
			if ($this->form_validation->run('reg') == FALSE)
			{
				$data['form_login'] = $this->userlib->auth_menu();
				//показываю страницу с формой регистрации. этап 1
				$this->load->view('user/reg', $data);
			}
			else
			{	
				//формирую массив полученных данных
				$data = array(	'name'		=>$this->input->post('name'),
								'surname'	=>$this->input->post('surname'),
								'email'		=>$this->input->post('email'),
								'password'	=>$this->input->post('password'),
								'sex'		=>$this->input->post('sex')
							);
					
				//вызываю функцию регистрации
				$this->userlib->reg($data);
			
				$data['form_login'] = $this->userlib->auth_menu();
				
				//эсли все успешно переходим к 2 этапу
				$this->load->view('user/reg_succesfull', $data);
			}
		}
		else
		{
			redirect(base_url());
		}		
	}
		
	/* Страница профиля */
	public function profile($id = null)
	{
		//если айди профиля не указан перенаправляем на главную
		if($id == null) 
		{
			redirect(base_url());
		}
		//если существует то показываем
		else
		{
			if($this->userlib->get_user($id)) {
				$data = $this->userlib->get($id);
				$data['form_login'] = $this->userlib->auth_menu();
				$data['id'] = $id;
				
				$this->load->model('Routes_model');
				$data['routes_active'] = $this->Routes_model->getUserRoutes($id);
				
				if($this->session->userdata('id') == $id)
				{
					$data['my_page'] = TRUE;
				}
			
				$this->load->view('user/profile', $data);
			} else {
				redirect(base_url() . "error");
			}
		}
	}
	
	/* Изминение данных профиля */
	public function edit($id = null)
	{
		if($this->session->userdata('logged_in') && $id != null && $this->session->userdata('id') == $id)
		{
			//стиль сообщение об ошибке
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				
			//текст сообщений с ошибками
			$this->form_validation->set_message('required', 'Поле "%s" не заполнено!');
			$this->form_validation->set_message('alpha', '%s не должно содержать символов!');

			//успешна ли валидация
			if ($this->form_validation->run('edit') == FALSE)
			{
				$data = $this->userlib->get($id);
				$data['form_login'] = $this->userlib->auth_menu();			
				$this->load->view('user/edit', $data);
			}
			else
			{	
				$dob = $this->input->post('y') . "-" . $this->input->post('m') . "-" . $this->input->post('d');
				
				if($this->input->post('phone') && $this->input->post('phone') != '') {
					$phone = $this->input->post('phone');
				} else {
					$phone = null;
				}
				
				if($this->input->post('car') && $this->input->post('car') != '') {
					$car = $this->input->post('car');
				} else {
					$car = null;
				}
				//формирую массив полученных данных
				$data = array('id'      => $id,
							  'name'    => $this->input->post('name'),
							  'surname' => $this->input->post('surname'),
							  'town' 	=> $this->input->post('town'),
							  'dob'     => $dob,
							  'phone'	=> $phone,
							  'car'     => $car
							  );
							  
				if($this->input->post('phone2') && $this->input->post('phone2') != '') {
					$phone2 = array('phone2' => $this->input->post('phone2'));
					$data = $data + $phone2;
				}
				if($this->input->post('phone3') && $this->input->post('phone3') != '') {
					$phone3 = array('phone3' => $this->input->post('phone3'));
					$data = $data + $phone3;
				}
				if($this->input->post('phone4') && $this->input->post('phone4') != '') {
					$phone4 = array('phone4' => $this->input->post('phone4'));
					$data = $data + $phone4;
				}
				if($this->input->post('phone5') && $this->input->post('phone5') != '') {
					$phone5 = array('phone5' => $this->input->post('phone5'));
					$data = $data + $phone5;
				}
							
				//вызываю функцию регистрации
				$this->userlib->edit($data);
				$data['form_login'] = $this->userlib->auth_menu();				
				$this->load->view('user/edit_succesfull', $data);
			}
			
		}
		else
		{
			redirect(base_url());
		}	
	}
	
	/* загрузка фото */
	function do_upload()
	{
		if($this->input->post('save')) {
				if($this->userlib->changePhoto($this->session->userdata('id'))) {
					redirect(base_url() . 'user/edit/' . $this->session->userdata('id'));
				}
		}
		
	}
	
	/* logout */
	public function logout() {
		if($this->session->userdata('logged_in')) {
			//завершить активную сессию
			$this->userlib->logout();
		} else {
			redirect(base_url());
		}
	}
	
	public function lostpassword($code = NULL) {
		if($code != NULL)
		{
			if($this->input->post('pass')) {
				$this->userlib->lostsuc($code, $this->input->post('pass'));
				$data['form_login'] = $this->userlib->auth_menu();
				$this->load->view('/user/passsave',$data);
			} else {
				if($this->userlib->getLostId($code)) {
					$data['form_login'] = $this->userlib->auth_menu();
					$data['code'] = $code;
					$this->load->view('user/newpass', $data);
				} else {
					redirect(base_url());
				}
			}			
		}
		else
		{	
			if(!$this->session->userdata('logged_in'))
			{
				//стиль сообщение об ошибке
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
					
				//текст сообщений с ошибками
				$this->form_validation->set_message('required', 'Поле "%s" не заполнено!');
				$this->form_validation->set_message('valid_email', '"%s" указана не верно!');
				
				//успешна ли валидация
				if ($this->form_validation->run('lost') == FALSE)
				{
					$data['form_login'] = $this->userlib->auth_menu();
					//показываю форму
					$this->load->view('user/lostpassword', $data);
				}
				else
				{	
					if(!$this->userlib->lostpass($this->input->post('email')))
					{
						$data['form_login'] = $this->userlib->auth_menu();
						$data['msg'] = '<div class="error">Такого пользователя не сущесвует!</div>';
						$this->load->view('user/lostpassword', $data);
					}
					else
					{
						$data['form_login'] = $this->userlib->auth_menu();
						$this->load->view('user/lostsuc', $data);
					}
				}
			}
			else
			{
				redirect(base_url());
			}
		}
	}
	
	public function activate($code = null) {
		if($code != null) {
			if($this->userlib->activate($code)) {
				$data['form_login'] = $this->userlib->auth_menu();	
				$this->load->view('user/activate', $data);
			}
		}
		else {
			redirect(base_url());
		}
	}
	
	public function auth($network = null) {
		if($network != null) {
			if($network == 'vk') {
				if(!$this->session->userdata('logged_in')) {
					$this->userlib->auth_vk();
					
				}
			}
			if($network == 'facebook') {
				if(!$this->session->userdata('logged_in')) {
					$this->userlib->auth_facebook();
				}
			}
		}
		else {
			redirect(base_url());
		}
	}
	
	public function test() {	
		$data['form_login'] = $this->userlib->auth_menu();	
		$this->load->view('user/email', $data);
	}
	
	
	public function test2() {
	$client_id = '3815398'; // ID приложения
		$client_secret = 'WtFJctP6AhEjc9Pz8kq2'; // Защищённый ключ
		$redirect_uri = 'http://nampopyti.com/user/test2/'; // Адрес сайта

    $url = 'http://oauth.vk.com/authorize';

    $params = array(
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri,
        'response_type' => 'code'
    );

    echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через ВКонтакте</a></p>';

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
            'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big,mail',
            'access_token' => $token['access_token']
        );

        $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
        if (isset($userInfo['response'][0]['uid'])) {
            $userInfo = $userInfo['response'][0];
            $result = true;
        }
    }

    if ($result) {
        echo "Социальный ID пользователя: " . $userInfo['uid'] . '<br />';
        echo "Имя пользователя: " . $userInfo['first_name'] . '<br />';
        echo "Ссылка на профиль пользователя: " . $userInfo['screen_name'] . '<br />';
        echo "Пол пользователя: " . $userInfo['sex'] . '<br />';
        echo "День Рождения: " . $userInfo['bdate'] . '<br />';
        echo '<img src="' . $userInfo['photo_big'] . '" />'; echo "<br />";
		echo $userInfo['mail'];
    }
}
	}
    
}