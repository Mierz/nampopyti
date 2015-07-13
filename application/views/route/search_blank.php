<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="revisit-after" content="3 days" />
	<meta name="description" content="Социальный проект объединяющий попутчиков разных категорий, предоставляющий огромную сеть необходимых Вам маршрутов по всей стране" />
	<meta name="keywords" content="попутчик, маршрутное такси, найти попутчика, совместные поездки, междугородние перевозки, carpool" />
	<title>Поиск маршрута - Нам по пути</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
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
			<div class="pull-right"><?=$form_login;?></div>
		</div>
	</div>

	<div class="row-fluid visible-desktop">
		<div class="span12 main-block main-h">			
			<form class="form-inline" action="/route/search" method="post">	
				<input class="input-xlarge" type="text" data-provide="typeahead" autocomplete="off" id="from" name="from" placeholder="<?=$this->lang->line('from')?>">				
				<button class="btn" rel="tooltip" title="Сменить направление" id="exchange" type="button"><i class="icon-resize-horizontal"></i></button>				
				<input class="input-xlarge" type="text" data-provide="typeahead" autocomplete="off" id="to" name="to" placeholder="<?=$this->lang->line('to')?>">
				<button type="submit" class="btn"><i class="icon-search"></i>&nbsp;Найти</button>
				<a href="#add-route" class="btn" role="button" data-toggle="modal"><i class="icon-plus"></i>&nbsp;Добавить маршрут</a>
			</form>				
		</div>			
	</div>
	
	<div class="row-fluid">
		<div class="span12" style="margin-top:20px;">
			<img src="/img/map.png">
		</div>
	</div>
	<div class="hFooter"></div>
</div>

<?php echo $this->load->view('_layout/footer'); ?>
<!-- Add route -->
<div id="add-route" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Добавление маршрута</h3>
  </div>
  <div class="modal-body">
    <div class="btn-group"> 
	<a href="/route/driver" class="btn btn-large">Я водитель</a>
	<a href="/route/passenger" class="btn btn-large">Я пассажир</a>
	<a href="/route/bus" class="btn btn-large">Маршрутное такси</a>
	</div>
  </div>  
</div>
<!-- Login form -->
<div id="login-form" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Авторизация</h3>
  </div>
  <div class="modal-body">
    <h5>Вы можете войти используя стандартную форму:</h5>
	<form action="/user/login" id="login_form" method="post" >
	<div class="control-group">
			<label class="control-label" for="inputEmail">Почта</label>
			<div class="controls">
			  <input input type="text" name="email" validate="required|email" maxlength="30" id="inputEmail" placeholder="Почта">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputPassword">Пароль</label>
			<div class="controls">
			  <input type="password" name="password" validate="required" maxlength="15" id="inputPassword" placeholder="Пароль">
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
	<a href="/user/auth/vk"><img src="/img/vk.png"></a>
	<a href="/user/auth/facebook"><img src="/img/facebook.png"></a>
  </div>  
</div>
<script>
$(document).ready(function(){
	$('#exchange').tooltip();
	$("#exchange").click(function () {
		var to = $("input[name='to']").val();
		var from = $("input[name='from']").val();
		$("input[name='to']").val(from);
		$("input[name='from']").val(to);
	});
});
</script>
<script src="/js/objects.js"></script>	
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