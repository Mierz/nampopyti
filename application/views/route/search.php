<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="revisit-after" content="3 days" />
	<meta name="description" content="Социальный проект объединяющий попутчиков разных категорий, предоставляющий огромную сеть необходимых Вам маршрутов по всей стране" />
	<meta name="keywords" content="попутчик, маршрутное такси, найти попутчика, совместные поездки, междугородние перевозки, carpool" />
	<title>Поиск маршрута: Из <?=$from?> в <?=$to?> - Нам по пути</title>
	<link rel="icon" href="/favicon.ico" type="image/x-icon">	
   	<script src="http://code.jquery.com/jquery-1.7.1.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/bootstrap-datepicker.js"></script>	
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">	
	<link href="/css/datepicker.css" rel="stylesheet">		
</head>
<body>
 
<div class="container test_main">
	<div class="row-fluid visible-desktop">
		<div class="span4">
			<a href="/"><img src="/img/logo.png" alt="Нам по пути" /></a>
			<div class="description-text">сервис объединяющий водителей и пассажиров</div>
		</div>
		<div class="span3 visible-desktop">
			&nbsp;
		</div>
		<div class="span5" style="margin-top:30px;">			
			<div class="pull-right"><?=$form_login;?></div>
		</div>
	</div>
		
	<div class="row-fluid visible-desktop">
		<div class="span12 main-block main-h">			
			<form class="form-inline" action="/route/search" method="post">	
				<input class="input-xlarge" type="text" data-provide="typeahead" autocomplete="off" id="from" name="from" value="<?=$from?>" placeholder="<?=$this->lang->line('from')?>">				
				<button class="btn" rel="tooltip" title="Сменить направление" id="exchange" type="button"><i class="icon-resize-horizontal"></i></button>				
				<input class="input-xlarge" type="text" data-provide="typeahead" autocomplete="off" id="to" name="to" value="<?=$to?>" placeholder="<?=$this->lang->line('to')?>">
				<button type="submit" class="btn"><i class="icon-search"></i>&nbsp;Найти</button>
				<a href="#add-route" class="btn" role="button" data-toggle="modal"><i class="icon-plus"></i>&nbsp;Добавить маршрут</a>
			</form>	
			
		</div>			
	</div>
	
	<h3>Поиск маршрута</h3>
	
	<div class="row-fluid m-top">		
	
		<div class="span3">
			<div class="well">
				<form method="post" action="/route/search">
					<div class="change_pass"></div>
					<div class="clearfix"></div>
					<p></p>
					<div class="change_driver"></div>			
					<div class="clearfix"></div>
					<input type="hidden" name="type-route" value="<?=$type?>">	
					<input type="hidden" name="ffrom">	
					<input type="hidden" name="fto">	
					
					<?php if($date) {
						$filter_date = $date;
					} else {
						$filter_date = date('Y-m-d');
					}
					?>
					
					<p><div class="input-append date" id="date" data-date="<?=$filter_date?>" data-date-format="yyyy-mm-dd">				
						<input class="span10" id="date" name="date" type="text" value="<?=$date?>">
						<span class="add-on"><i class="icon-calendar"></i></span>
					</div></p>
					
					<p><select class="span5" name="seats">
						<option value="0">Мест</option>
						<?php for($i = 1; $i <= 7; $i++) { 
							if($i == $seats) {					
								echo '<option value="'.$i.'" selected>'.$i.'</option>';
							} else {
								echo '<option value="'.$i.'">'.$i.'</option>';
							}
						} ?>
					</select></p>							
					
					<div class="clearfix"></div>
								
					<button type="submit" class="btn"><i class="icon-search"></i>&nbsp;Найти</button>				
				</form>
			</div>
		</div>
		
		<div class="span9">
				
			<?php
			if(!$text) {
			?>			
			<div class="alert alert-error">
				<strong>Упс!</strong>
				По вашему маршруту поездок не найдено!
			</div>
			
			<?php
			}
			else {
			?>
			
			<table class="table table-bordered table-striped" id="block">  
			  <thead>
				<tr>
				  <th><span>Найдено: <?php echo count($text); ?></span></th>			 
				</tr>
			  </thead>
			  <tbody>
				 <?php				
					foreach($text as $item)	{
						if($item['group_id'] == 2) {
							if($item['const'] == 1) {
							echo '<tr><td>															
									<div style="float:left;width:80%;">
										<p style="margin:5px;"><img src="/img/green-p.png" /> <a class="route" style="font-size:16px;" href="/route/view/'.$item['id'].'"><b>' . $item['from'] . '</b> &rarr; <img src="/img/red-p.png" /> <b>' . $item['to'] . '</b></a></p>
										<p style="margin:5px;"><b>Точка отправления:</b> '.$item['pos'].'</p>
										<p style="margin:5px;"><b>Точка прибытия:</b> '.$item['poa'].'</p>
									</div>	
									<div style="float:left;padding-left:15px;">
										<p><span style="font-size:16px;"><b>'.$item['price'].'</b></span> грн.<br/>за место</p>
										<p><b>Всего мест:</b> <span style="font-size:16px;font-weight:bold;">'.$item['seats'].'</span></p>
									</div>
							<div class="clearfix"></div>
							<span class="label">Автобус</span></td></tr>';				
							}
							else {
								echo '<tr><td><span class="label">Водитель</span> <a class="route" href="/route/view/'.$item['id'].'">Из <b>' . $item['from'] . '</b> в <b>' . $item['to'] . '</b>, '. $item['price'].' грн.</a></td></tr>';				
							}
						} else {
							echo '<tr><td><span class="label">Пассажир</span> <a class="route" href="/route/view/'.$item['id'].'">Из <b>' . $item['from'] . '</b> в <b>' . $item['to'] . '</b>, ' . $item['seats'] . ' чел.</a></td></tr>';
						}
						
				}
				?>		
			  </tbody>
			</table>
			
			<?php
			}
			?>
			
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
<!-- Add route -->
<div id="add-route" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Добавление маршрута</h3>
  </div>
  <div class="modal-body">
    <div class="btn-group"> 
	<a href="/route/driver" class="btn btn-large">Я водитель</a>
	<a href="/route/passenger" class="btn btn-large">Я пассажир</a>
	<a href="/route/bus" class="btn btn-large">Маршрутное такси</a>
	</div>
  </div>  
</div>

<script>
$(document).ready(function(){
	var to = $("input[name='to']").val();
	var from = $("input[name='from']").val();
	$("#exchange").click(function () {		
		$("input[name='to']").val(from);
		$("input[name='from']").val(to);		
	});
	$('#exchange').tooltip();
	$('#date').datepicker();
	$("input[name='ffrom']").val(from);
	$("input[name='fto']").val(to);
	$(".change_pass").click(function () {
		$("input[name='type-route']").val("1");	
		if($("input[name='type-route']").val() == 1) {			
			$(".change_driver").removeClass("change_driver_active");
		}		
		$(".change_pass").addClass("change_pass_active");
	});
	$(".change_driver").click(function () {
		$("input[name='type-route']").val("2");
		if($("input[name='type-route']").val() == 2) {			
			$(".change_pass").removeClass("change_pass_active");
		}	
		$(".change_driver").addClass("change_driver_active");		
	});
	if($("input[name='type-route']").val() == 1) {	
		$(".change_pass").addClass("change_pass_active");
	}
	if($("input[name='type-route']").val() == 2) {	
		$(".change_driver").addClass("change_driver_active");
	}
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