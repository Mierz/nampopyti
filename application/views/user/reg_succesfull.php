<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Регистрация - Нам по пути</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
</head>
<body>

<div class="container test_main">
	<div class="row-fluid visible-desktop">
		<div class="span4">
			<a href="/"><img src="/img/logo.png"></a>
			<div class="description-text">Сервис объединяющий водителей и пассажиров</div>
		</div>
		<div class="span3 visible-desktop">
			&nbsp;
		</div>
		<div class="span5" style="margin-top:30px;">			
			<div class="pull-right"><?=$form_login;?></div>
		</div>
	</div>
	
	<div class="row-fluid hr"></div>
	
	<div class="row-fluid m-top">		
	
		<div class="span12">
			
			<div class="alert alert-success">
			  <strong>Успех</strong> Вам на почту отправлено письмо с кодом активации подтвердите свой аккаунт!
			</div>
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