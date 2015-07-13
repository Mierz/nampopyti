<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="robots" content="all" />
	<meta name="revisit-after" content="3 days" />
	<meta name="description" content="Социальный проект объединяющий попутчиков разных категорий, предоставляющий огромную сеть необходимых Вам маршрутов по всей стране" />
	<meta name="keywords" content="попутчик, маршрутное такси, найти попутчика, совместные поездки, междугородние перевозки, carpool" />
	<title>Обратная связь - Нам по пути</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
	<script src="/js/bootstrap.validate.js"></script>
    <script src="/js/bootstrap.validate.ru.js"></script>	
	<script src="/js/jquery.maskedinput.min.js" type="text/javascript"></script>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
</head>
<body>

<div class="container test_main">
	<div class="row-fluid visible-desktop">
		<div class="span4">
			<a href="/"><img src="/img/logo.png"></a>
			<div class="description-text">сервис объединяющий водителей и пассажиров</div>
		</div>
		<div class="span3">
			&nbsp;
		</div>
		<div class="span5" style="margin-top:30px;">			
			<div class="pull-right" id="navlink"><?=$form_login;?></div>
		</div>
	</div>
	
	<div class="row hr">
	<h3>Связь с нами</h3>
	</div>
		
	<div class="row-fluid" style="padding-top:20px;">
		<div class="span12" style="text-align:justify;">	
			<?php
			if(isset($send)) {
			?>
				<div class="alert alert-success">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Успех!</strong> Ваше сообщение успешно отправлено.
				</div>
			<?php
			}			
			?>
		
		
			<form action="/page/contacts/" method="post" id="contact_form">
				<div class="control-group">
					<label class="control-label" for="type"><b>Я</b></label>
					<div class="controls">						  
						<select name="type">
							<option>Выберите</option>
							<option value="Я пассажир">Я пассажир</option>
							<option value="Я водитель">Я водитель</option>
							<option value="Маршрутное такси">Маршрутное такси</option>
							<option value="Другое">Другое</option>
						</select>
					</div>
					</div>
				<div class="control-group">
					<label class="control-label" for="subject"><b>Тема</b></label>
					<div class="controls">						  
						  <input class="span3" validate="required" name="subject" type="text" />						  
						</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="msg"><b>Сообщение</b></label>
					<div class="controls">						  
						  <textarea class="span4" name="msg" validate="required" style="resize:vertical;" id="comment" name="comment" rows="5"></textarea>						  
						</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="email"><b>Email</b></label>
					<div class="controls">						  
						  <input class="span3" name="email" validate="required|email" type="text" />						  
						</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="phone"><b>Телефон</b></label>
					<div class="controls">						  
						  <input class="span3" name="phone" id="phone" type="text" />						  
						</div>
					</div>
				<input type="submit" class="btn" value="Отправить" />
			</form>
		</div>
	</div>
	<div class="hFooter"></div>
</div>

<?php echo $this->load->view('_layout/footer'); ?>
<!-- Login form -->
<div id="login-form" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Авторизация</h3>
  </div>
  <div class="modal-body">
    <h5>Вы можете войти используя стандартную форму:</h5>
	<form action="/user/login" id="login_form" method="post" >
	<div class="control-group">
			<label class="control-label" for="inputEmail">Почта</label>
			<div class="controls">
			  <input input type="text" name="email" validate="required|email" maxlength="30" id="inputEmail" placeholder="Почта" />
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputPassword">Пароль</label>
			<div class="controls">
			  <input type="password" name="password" validate="required" maxlength="15" id="inputPassword" placeholder="Пароль" />
			</div>
		  </div>
		  <div class="control-group">
			<div class="controls">				  
			  <button type="submit" class="btn">Войти</button>
			  &nbsp;<a href="/user/lostpassword/">Забыл пароль?</a>
			</div>
		  </div>
	</form>
	<h5>Или войти через социальные сети:</h5>
	<a href="/user/auth/vk"><img src="/img/vk.png" alt="Войти через Вконтакте" /></a>
	<a href="/user/auth/facebook"><img src="/img/facebook.png"  alt="Войти через Facebook" /></a>
  </div>  
</div>
<script>
$(document).ready(function(){
	$('#contact_form').bt_validate();
	$("#phone").mask("(999) 999-99-99");
});
</script>
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter22058734 = new Ya.Metrika({id:22058734,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/22058734" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->	
</body>
</html>