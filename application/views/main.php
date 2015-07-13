<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="robots" content="all" />
	<meta name="revisit-after" content="3 days" />
	<meta name="description" content="Найти попутчика или попутку. Социальный проект объединяющий попутчиков разных категорий, предоставляющий огромную сеть необходимых Вам маршрутов по Украине и СНГ" />
	<meta name="keywords" content="попутчик, попутка, Украина, СНГ, маршрутное такси, найти попутчика, совместные поездки, междугородние перевозки, carpool" />
	<title>Социальный проект объединяющий попутчиков - Нам по пути</title>
	<link rel="icon" href="/favicon.ico" type="image/x-icon">	
   	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/bootstrap.validate.js"></script>
        <script src="/js/bootstrap.validate.ru.js"></script>	
	<script src="/js/jcarousellite_1.0.1.min.js"></script>	
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>	
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
</head>
<body>	
<div class="container test_main">
	<div class="row-fluid visible-desktop">
		<div class="span4">
			<a href="http://nampopyti.com/"><img src="/img/logo.png" alt="Нам по пути" /></a>
			<div class="description-text">сервис объединяющий водителей и пассажиров</div>
		</div>
		<div class="span2 visible-desktop">
			&nbsp;
		</div>
		<div class="span6 login-top">			
			<div class="pull-right"><?=$form_login;?></div>
		</div>
	</div>
	<div class="row-fluid visible-desktop">
		<div class="span12 main-block">
			<div class="span4">
				<div class="slogan">
				<img src="/img/slogan.png" alt="Найти попутчика не вставая с кресла? ЛЕГКО!" /></div>
			</div>
			<div class="span3">&nbsp;</div>
			<div class="span5">
				<form class="search_form" action="/main/" method="post">
					<div class="input-prepend">
					  <span class="add-on" style="background:#77bf37;border:1px solid #45741d;"><i class="icon-arrow-right icon-white"></i></span><input class="input-xlarge" type="text" data-provide="typeahead" autocomplete="off" id="from" name="from" placeholder="От...">
					</div>	
					<div class="input-prepend">
					  <span class="add-on" style="background:#f76458;border:1px solid #b83b33;"><i class="icon-arrow-left icon-white"></i></span><input class="input-xlarge" type="text" data-provide="typeahead" autocomplete="off" id="to" name="to" placeholder="Куда...">
					</div>						
					<div class="input-prepent">							
						<button type="submit" class="btn"><i class="icon-search"></i>&nbsp;Найти</button>
						<a href="#add-route" class="btn" role="button" data-toggle="modal"><i class="icon-plus"></i>&nbsp;Добавить маршрут</a>
					</div>					
				</form>
			</div>
		</div>			
	</div>				
	
	<?php
	if(isset($noEmail)) {
	?>
		<div class="alert alert-block m-top">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Внимание!</h4>
			Укажите вашу активную почту в <a href="/user/edit/<?php echo $this->session->userdata('id'); ?>">настройках</a> профиля, чтоб получать уведомления о событиях.
		</div>
	<?
	}
	?>
	
	<?php
	if(isset($noPhone)) {
	?>
		<div class="alert alert-block m-top">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Внимание!</h4>
			Укажите ваши контактные телефоны в <a href="/user/edit/<?php echo $this->session->userdata('id'); ?>">настройках</a> профиля, чтоб другие пользователи могли с вами связаться.
		</div>
	<?
	}
	?>
	
	<div class="row-fluid m-top">				
		<div class="span8">				
			<div class="route_t">				
				<div class="route_bus_t">
					<div class="pagi-bus">
						<a href="#" class="btn btn-mini prev"><i class="icon-backward"></i></a>
						<a href="#" class="btn btn-mini next"><i class="icon-forward"></i></a>
					</div>
					<a href="http://nampopyti.com/route/all_bus/">Маршрутное такси</a>
				</div>			
				<div> 
				  <div class="VjCarouselLite">
				   <ul>
				   
					<?php
					if(isset($bus)) {
						$i = 0;
						foreach($bus as $item)	{
							if(date('d-m-Y') <= $item['date']) {
								if($item['photo'] != null) {
									$photo = '<img src="'.$item['photo'].'" class="img-rounded photo-main" alt="Фото" />';
								} else {
									
									$photo = '<img src="/img/no_photo.png" class="img-rounded photo-main" alt="Фото" />';
								}
								if($i%2 == 0) { $bck = "bck-one"; } else { $bck = "bck-two"; }
								echo '<li>
										<div class="bus-main-b '.$bck.'">
											<div class="price-block">
												<p class="fnt-big"><span class="fnt-bigg"><b>'.$item['price'].'</b></span> грн.<br/>за место</p>
												<p>&nbsp;</p>
												<p><b>Всего мест:</b> <span class="price">'.$item['seats'].'</span></p>
											</div>
											<div class="photo-block"><a href="/user/profile/'.$item['author'].'" title="Перейти на профиль пользователя">'.$photo.'</a></div>
											<div class="route-block">
												<p class="mrg-min"><img src="/img/green-p.png" /> <a class="route fnt-normal" href="/route/view/'.$item['id'].'"><b>' . $item['from'] . '</b> &rarr; <img src="/img/red-p.png" /> <b>' . $item['to'] . '</b></a></p>
												<p class="mrg-min"><b>Точка отправления:</b> '.$item['pos'].'</p>
												<p class="mrg-min"><b>Точка прибытия:</b> '.$item['poa'].'</p>
											</div>										
										</div>
									</li>';				
							}
							$i++;
						}
					}
					?>					
				   </ul>
				  </div>
				</div>		
			</div>			
		</div>		
		<div class="span4">
			<script type="text/javascript" src="//vk.com/js/api/openapi.js?101"></script>
			<!-- VK Widget -->
			<div id="vk_groups"></div>
			<script type="text/javascript">
				VK.Widgets.Group("vk_groups", {mode: 0, width: "290", height: "370", color1: 'f0f0f0', color2: '999999', color3: '06799f'}, 57041209);
			</script>	
		</div>		
	</div>	
	<div class="clearfix" style="height:20px;"></div>	
	<div class="row-fluid m-top">	
		<div class="span12">
			<table class="table table-bordered table-striped" id="driver">  
			  <thead>
				<tr>
				  <th><a href="/route/all_driver/">Выезжающий транспорт</a></th>			 
				</tr>
			  </thead>
			  <tbody>
				 <?php
					if(isset($driver)) {
					$i = 0;
					foreach($driver as $item)	{
						if(strtotime(date('d-m-Y')) <= strtotime($item['date'])) {
							
							if($item['photo'] != null) {
								$photo = '<img src="'.$item['photo'].'" class="img-rounded photo-main" style="height:25px;width:25px;" alt="Фото">';
							} else {
								
								$photo = '<img src="/img/no_photo.png" class="img-rounded photo-main" style="height:25px;width:25px;" alt="Фото">';
							}
							echo '<tr><td><div class="pull-right"><b>Выезд: '.$item['date'].'</b></div><div style="float:left;width:30px;"><a href="/user/profile/'.$item['author'].'" title="Перейти на профиль пользователя">'.$photo.'</a></div><img src="/img/green-p.png" /> <a class="route" href="/route/view/'.$item['id'].'"><b>' . $item['from'] . '</b> &rarr; <img src="/img/red-p.png" /> <b>' . $item['to'] . '</b>, <span style="font-size:15px;font-weight:bold;">'. $item['price'].'</span> грн., Возьму <span style="font-size:15px;font-weight:bold;">'.$item['seats'].'</span> чел.</a></td></tr>';											
                                                        $i++;                                                        
                                                        }	
					}
                                        if($i == 0) {
								echo "<tr><td><div class=\"alert alert-error\" ><b>Упс!</b> К сожалению активные объявления отсутствуют!</div><a href=\"/route/driver\" class=\"btn btn-mini\"><i class=\"icon-plus\">&nbsp;</i>Добавить свое</a></td></tr>";
							}
                                        
                                                        }	
				?>	
			  </tbody>
			</table>
		</div>
	</div>		
	<div class="row-fluid m-top">	
		<div class="span12">		
			<table class="table table-bordered table-striped" id="pass">  
			  <thead>
				<tr>
				  <th><a href="/route/all_passenger/">Ищут водителя</a></th>			 
				</tr>
			  </thead>
			  <tbody>
				 <?php				 
				 if(isset($pass)) { $i = 0;
					foreach($pass as $item)	{
						if(strtotime(date('d-m-Y')) <= strtotime($item['date'])) {
							if($item['photo'] != null) {
								$photo = '<img src="'.$item['photo'].'" class="img-rounded photo-main" style="height:25px;width:25px;" alt="Фото">';
							} else {
								
								$photo = '<img src="/img/no_photo.png" class="img-rounded photo-main" style="height:25px;width:25px;" alt="Фото">';
							}
							echo '<tr><td><div class="pull-right"><b>Выезд: '.$item['date'].'</b></div><div style="float:left;width:30px;"><a href="/user/profile/'.$item['author'].'" title="Перейти на профиль пользователя">'.$photo.'</a></div><img src="/img/green-p.png" /> <a class="route" href="/route/view/'.$item['id'].'"><b>' . $item['from'] . '</b> &rarr; <img src="/img/red-p.png" /> <b>' . $item['to'] . '</b>, <span style="font-size:15px;font-weight:bold;">' . $item['seats'] . '</span> чел.</a></td></tr>';						
							$i++;
						}
					}
                                        if($i == 0) {
						echo "<tr><td><div class=\"alert alert-error\" ><b>Упс!</b> К сожалению активные объявления отсутствуют!</div><a href=\"/route/passenger\" class=\"btn btn-mini\"><i class=\"icon-plus\">&nbsp;</i>Добавить свое</a></td></tr>";
					}
                                        }					
				?>	
			  </tbody>
			</table>		
		</div>		
	</div>
	<div class="row-fluid">
		<div class="span2">		<!-- Put this script tag to the <head> of your page -->
			<script type="text/javascript" src="//vk.com/js/api/openapi.js?101"></script>
			<script type="text/javascript">
			  VK.init({apiId: 3815398, onlyWidgets: true});
			</script>
			<!-- Put this div tag to the place, where the Like block will be -->
			<div id="vk_like"></div>
			<script type="text/javascript">
			VK.Widgets.Like("vk_like", {type: "button"});
			</script>
		</div>
		<div class="span2">	
			<a href="https://twitter.com/share" class="twitter-share-button" data-via="nampopyti" data-lang="ru">Твитнуть</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		</div>
	</div>
        <div class="row-fluid"><a href="http://www.online.ua/" target="_blank"> <img src="http://i.online.ua/catalog/logo/42.png" alt="Украина онлайн" border="0" width="88" height="17"> </a></div>
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
<script src="/js/objects.js"></script>
<script>
$(document).ready(function() {
$('#login_form').bt_validate();
$(".VjCarouselLite").jCarouselLite({
	vertical: true,
	visible: 3,
	auto: 5000,
	speed: 700,
	circular: true,
	btnNext: ".next",
       btnPrev: ".prev"
});
});
</script>
<!-- Yandex.Metrika counter -->
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