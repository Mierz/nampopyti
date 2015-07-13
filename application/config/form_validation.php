<?php

/**
 * @author mieRz
 * @copyright 2013
 */

//параметры для валидации формы
$config = array(
				'reg' => array(
                            array(
                                'field'   => 'name', 
                                'label'   => 'Имя', 
                                'rules'   => 'required|min_length[3]|alpha|xss_clean'
                            ),
                            array(
                                'field'   => 'surname', 
                                'label'   => 'Фамилия', 
                                'rules'   => 'required|min_length[2]|alpha|xss_clean'
                            ),
                            array(
                                'field'   => 'password', 
                                'label'   => 'Пароль', 
                                'rules'   => 'required|min_length[6]|xss_clean'
                            ),   
                            array(
                                'field'   => 'email', 
                                'label'   => 'Почта', 
                                'rules'   => 'required|valid_email|is_unique[users.email]|xss_clean'
                            )
                ),
				'search' => array(
                           array(
                                'field'   => 'from', 
                                'label'   => 'От', 
                                'rules'   => 'required|xss_clean'
                            ),
                            array(
                                'field'   => 'to', 
                                'label'   => 'Куда', 
                                'rules'   => 'required|xss_clean'
                            ),                             
                ),
				'route' => array(
                            array(
                                'field'   => 'ffrom', 
                                'label'   => 'От', 
                                'rules'   => 'required|xss_clean'
                            ),
                            array(
                                'field'   => 'fto', 
                                'label'   => 'Куда', 
                                'rules'   => 'required|xss_clean'
                            ),    
							array(
                                'field'   => 'seats', 
                                'label'   => 'Количество пассажиров', 
                                'rules'   => 'required|xss_clean'
                            ), 		
							array(
                                'field'   => 'hour', 
                                'rules'   => 'xss_clean'
                            ), 	
							array(
                                'field'   => 'min', 
                                'rules'   => 'xss_clean'
                            ), 		
							array(
                                'field'   => 'dop', 
                                'rules'   => 'xss_clean'
                            ), 									
                ),		
				'route_driver' => array(
                            array(
                                'field'   => 'ffrom', 
                                'label'   => 'От', 
                                'rules'   => 'required|xss_clean'
                            ),
                            array(
                                'field'   => 'fto', 
                                'label'   => 'Куда', 
                                'rules'   => 'required|xss_clean'
                            ),
							array(
                                'field'   => 'seats', 
                                'label'   => 'Количество мест', 
                                'rules'   => 'required|integer|xss_clean'
                            ), 	
							array(
                                'field'   => 'comment', 
                                'label'   => 'Комментарий', 
                                'rules'   => 'xss_clean'
                            ), 
							array(
                                'field'   => 'price', 
                                'label'   => 'Цена за место', 
                                'rules'   => 'required|integer|xss_clean'
                            ), 	
                ),	
				'edit' => array(
                            array(
                                'field'   => 'name', 
                                'label'   => 'Имя', 
                                'rules'   => 'required|alpha|xss_clean'
                            ),
                            array(
                                'field'   => 'surname', 
                                'label'   => 'Фамилия', 
                                'rules'   => 'required|alpha|xss_clean'
                            ),    
							array(
                                'field'   => 'dob', 
                                'label'   => 'Дата рождения', 
                                'rules'   => 'xss_clean'
                            ), 
							array(
                                'field'   => 'car', 
                                'label'   => 'Автомобиль', 
                                'rules'   => 'xss_clean'
                            ),   							
                ),					
				'login' => array(
							array(
								'field'   => 'email',
                                'label'   => 'Почта', 
                                'rules'   => 'required|valid_email|xss_clean'
								),
							array(
								'field'   => 'password',
                                'label'   => 'Пароль', 
                                'rules'   => 'required|xss_clean'
								)
				),
				'lost' => array(
							array(
								'field'   => 'email',
								'label'   => 'Почта',
								'rules'   => 'required|valid_email|xss_clean'
								),
				),	
				'msg' => array(
							array(
								'field'   => 'msg',
								'label'   => 'Сообщение',
								'rules'   => 'required|xss_clean'
								),
				),	
				'contact' => array(
							array(
								'field'   => 'type',
                                'label'   => 'Тип', 
                                'rules'   => 'xss_clean'
								),
							array(
								'field'   => 'Тема',
                                'label'   => 'subject', 
                                'rules'   => 'xss_clean'
								),
							array(
								'field'   => 'Сообщение',
                                'label'   => 'msg', 
                                'rules'   => 'xss_clean'
							),
							array(
								'field'   => 'Почта',
                                'label'   => 'email', 
                                'rules'   => 'xss_clean'
							),
							array(
								'field'   => 'Телефон',
                                'label'   => 'phone', 
                                'rules'   => 'xss_clean'
								)
				),				
				
);

?>