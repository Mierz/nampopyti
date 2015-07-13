<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="revisit-after" content="3 days" />
	<meta name="description" content="Социальный проект объединяющий попутчиков разных категорий, предоставляющий огромную сеть необходимых Вам маршрутов по всей стране" />
	<meta name="keywords" content="попутчик, маршрутное такси, найти попутчика, совместные поездки, междугородние перевозки, carpool" />
	<title>Маршрут: Из <?=$from?> в <?=$to?> - Нам по пути</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>	
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<script src="/js/map_view.js"></script>
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
	
	<h3><?=$from?> &rarr; <?=$to?></h3>
	
	<p><script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script><div style="float:left;font-weight:bold;line-height:25px;">Поделиться:</div> 
	<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki"></div></p>
	
	<input type="hidden" id="route-from" value="<?=$from?>" />
	<input type="hidden" id="route-to" value="<?=$to?>" />
	<select multiple style="display:none;" id="my_select" size="5">
	<?php
		foreach($points as $item) {
			if($item['p1'] != null) {
				$result = "<option>".$item['p1']."</option>";
			}
			if($item['p2'] != null) {
				$result .= "<option>".$item['p2']."</option>";
			}
			if($item['p1'] != null) {
				$result .= "<option>".$item['p3']."</option>";
			}
			if($item['p1'] != null) {
				$result .= "<option>".$item['p4']."</option>";
			}
			if($item['p1'] != null) {
				$result .= "<option>".$item['p5']."</option>";
			}
			if($item['p1'] != null) {
				$result .= "<option>".$item['p6']."</option>";
			}
			echo $result;			
		}
	?>
	</select>
	
	<div class="row">
		<div class="span3 pull-right">	
		<?php
		if(date('Y-m-d') <= $date) {
		?>
		<div class="well">
			<?php
			if($group == 2) {
			?>
				<p><span style="font-size:24px;"><?=$price?> грн.</span> за место</p>
				<p><span style="font-size:24px;"><?=$seats?> мест</span> осталось</p>
				
				<a class="btn" href="/msg/send/<?=$author?>"><i class="icon-envelope"></i>&nbsp;Написать водителю</a>
				
			<?php
			}
			if($group == 1) {
			?>
				<p><span style="font-size:24px;"><?=$seats?> </span> пассажира</p>
				<a class="btn" href="/msg/send/<?=$author?>">Подвезу</a>
			<?php
			}
			?>				
		</div>
		<?php } ?>
		
		<div class="well">
			<p style="font-size:16px;font-weight:bold;"><a href="/user/profile/<?=$author?>"><?=$surname?> <?=$name?></a></p>
			<?php if($car != null) { ?>
			<p><b>Автомобиль:</b> <?=$car?></p>
			<?php }	?>
			<?php if($age != 0) { ?>
			<p><b>Возраст:</b> <?=$age?> лет</p>
			<?php }	?>
			<?php if($this->session->userdata('logged_in')) { 
				if(isset($phone) && !isset($phone2)) {
			?>
			<p><b>Телефон:</b> <?=$phone?></p>
			<?php } else { 
				if($phone2 != '') {
				echo "<p><b>Телефоны:</b></p>";
					echo $phone2 . "<br/>";
				}
				if($phone3 != '') {
					echo $phone3 . "<br/>";
				}
				if($phone4 != '') {
					echo $phone4 . "<br/>";
				}
				if($phone5 != '') {
					echo $phone5 . "<br/>";
				}
			} } ?>
			<div style="width:150px;margin:0 auto;"><a href="/user/profile/<?=$author?>">
			<?php
			if(isset($avatar)) {
				echo "<p><img src='".$avatar."' style='width:150px;height:150px;border:3px solid #e5e5e5;' class='img-rounded'></p>";
			}
			else {
				echo "<p><img src='/img/no_photo.png' style='width:150px;height:150px;border:3px solid #e5e5e5;' class='img-rounded'></p>";
			}
			?>
			</a></div>
			
		</div>
		
		</div>
		
		<div class="span9">
		<div class="clearfix"></div>
		<div class="route-map" id="map-canvas">	</div>	
		<p></p>
				
		<?php if(isset($shelude)) { ?>
		<table class="table table-bordered table-striped">  
		  <thead style="background:#06799f;color:#fff;">
			<tr>
			  <th colspan="10"><span>График отправления</span></th>			 
			</tr>
		  </thead>
		  <tbody style="font-weight:bold;" id="shelude">
		  <?php
			echo "<tr>";
			for($i = 0; $i < count($shelude); $i++) {
				if($shelude[$i] != '') {
					echo "<td>".$shelude[$i]."</td>";
				}
				if($i == 9) {
					echo "</tr><tr>";
				}
			}
			echo "</tr>";
			?>
		  
		  </tbody>
		  </table>
	<?php } ?>
		<table class="table table-bordered table-striped">  
		  <thead style="background:#024e68;color:#fff;">
			<tr>
			  <th colspan="2"><span>Детали поездки</span></th>			 
			</tr>
		  </thead>
		  <tbody>
			<?php if(isset($pos)) { ?>
			<tr>
			  <td class="span3">Точка отправления:</td>
			  <td class="span9"><img src="/img/green-p.png" /> <b><?=$pos?></b></td>
			</tr>
			<?php } ?>
			<?php if(isset($poa)) { ?>
			<tr>
			  <td>Точка прибытия:</td>
			  <td><img src="/img/red-p.png" /> <b><?=$poa?></b></td>
			</tr>
			<?php } ?>
			<?php if($points) { ?>
			<tr>
			  <td>Промежуточные адреса:</td>
			  <td>
			  <?php				
				foreach($points as $item) {
					$result = "<p><b>".$item['p1']."</b></p>";
					$result .= "<p><b>".$item['p2']."</b></p>";
					$result .= "<p><b>".$item['p3']."</b></p>";
					$result .= "<p><b>".$item['p4']."</b></p>";
					$result .= "<p><b>".$item['p5']."</b></p>";
					$result .= "<p><b>".$item['p6']."</b></p>";
					echo $result;			
				}
			?></td>
			</tr>
			<?php } ?>
			<?php if(!$bus) { ?>
			<tr>
			  <td>Дата отправления:</td>
			  <td><b><?=$date?></b></td>
			</tr>
			<?php } else { ?>
			<tr>
			  <td>Дата отправления:</td>
			  <td><b>Каждый день</b></td>
			</tr>
			<?php } ?>
			<?php if(isset($departure_h)) { ?>
			<tr>
			  <td>Время отправления:</td>
			  <td><b><?=$departure_h?>:<?=$departure_m?> +/- <?=$departure_lapse?></b></td>
			</tr>
			<?php } else {
			if(!$bus) { ?>	
			<tr>
			  <td>Время отправления:</td>
			  <td><b>Любое</b></td>
			</tr>
			<?php } } ?>	
			<?php if(isset($date_return)) { ?>
			<tr>
			  <td>Дата возвращения:</td>
			  <td><b><?=$date_return?></b></td>
			</tr>	
			<?php if(isset($return_h)) { ?>
			<tr>
			  <td>Время возвращения:</td>
			  <td><b><?=$return_h?>:<?=$return_m?> +/- <?=$return_lapse?></b></td>
			</tr>
			<?php } else { ?>	
			<tr>
			  <td>Время возвращения:</td>
			  <td><b>Любое</b></td>
			</tr>
			<?php } } ?>
			<?php if(isset($comment)) { ?>
			<tr>
			  <td>Комментарий водителя:</td>
			  <td><p style="padding-left:30px;font-weight:bold;background:url(/img/q.png);background-repeat:no-repeat;"><?=$comment?></p></td>
			</tr>	
	<?php } ?>				
		  </tbody>
		</table>

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
<script src="/js/objects.js"></script>	
<script>
$(document).ready(function(){
	$('#exchange').tooltip();
	$("#re").click(function () {
		calcRoute();
	});
	$("#exchange").click(function () {
		var to = $("input[name='to']").val();
		var from = $("input[name='from']").val();
		$("input[name='to']").val(from);
		$("input[name='from']").val(to);
	});
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