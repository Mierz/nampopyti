<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Авторизация - <?=$this->lang->line('title')?></title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="/js/bootstrap.min.js"></script>
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
		<div class="span3 visible-desktop">
			&nbsp;
		</div>
		<div class="span5" style="margin-top:30px;">			
			<div class="pull-right"><?=$form_login;?></div>
		</div>
	</div>
	
	<div class="row-fluid hr">
		<h3>Авторизация</h3>
	</div>
	
	<div class="row-fluid" style="padding-top:20px;">
		<div class="span12">
        			
			<?php
			if(isset($msg))
			{
				echo '<div class="alert alert-error">' . $msg . '</div>';
			}
			?>
			
			<?php 
			if(form_error('email'))
			{
				echo '<div class="alert alert-error">' . form_error('email') . '</div>'; 
			}
			if(form_error('password'))
			{
				echo '<div class="alert alert-error">' . form_error('password') . '</div>'; 
			}
			?>			
		</div>
	</div>
	<div class="row-fluid">
	
		<div class="span6">
		<h4>Вы можете войти через обычную форму:</h4>
		</div>
		
		<div class="span6">
		<h4>Или войти через социальные сети:</h4>
		<a href="/user/auth/vk"><img src="/img/vk.png" alt="Войти через Вконтакте" /></a>
		<a href="/user/auth/facebook"><img src="/img/facebook.png"  alt="Войти через Facebook" /></a>
		</div>
	
			<form action="/user/login" method="post">
			  <div class="control-group">
				<label class="control-label" for="inputEmail">Почта</label>
				<div class="controls">
				  <input input type="text" name="email" maxlength="30" id="inputEmail" placeholder="Почта">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Пароль</label>
				<div class="controls">
				  <input type="password" name="password" maxlength="15" id="inputPassword" placeholder="Пароль">
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">				  
				  <button type="submit" class="btn">Войти</button>
				</div>
			  </div>
			</form>
		
		</div>	
<div class="hFooter"></div>
</div>
	
<?php echo $this->load->view('_layout/footer'); ?>
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