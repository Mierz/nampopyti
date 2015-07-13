<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Профиль пользователя <?=$surname?> <?=$name?> - <?=$this->lang->line('title')?></title>
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">	
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
	
	<div class="row hr">
	<h3><b><?=$surname?> <?=$name?></b>
	
	 <?php
	if(isset($my_page))
	{
		echo '<a class="btn btn-small" href="/user/edit/'. $this->session->userdata('id') .'"><i class="icon-pencil"></i> Редактировать</a>';
	}	?></h3>
	</div>
	
	
	<div class="row-fluid" style="padding-top:20px;">
	
		<div class="span3">
		
			<div class="well">		
				<div style="width:150px;margin:0 auto;margin-bottom:10px;"><?php
					if($photo != NULL) {
						echo "<img src='".$photo."' style='width:150px;height:150px;border:3px solid #e5e5e5;' class='img-rounded'>";
					}
					else				
					{
						echo "<img src='/img/no_photo.png' style='width:150px;height:150px;border:3px solid #e5e5e5;' class='img-rounded'>";
					}
				?></div>

				<?php if($d != '00' && $m != '00' && $y != '0000') { ?>
				<div style="float:left;width:100px;">
					<b>Дата рождения:</b>				
				</div>
				<div>
					<?=$d?>-<?=$m?>-<?=$y?>
				</div>				
				<div class="clearfix"></div>
				<?php } ?>
				<div style="float:left;width:100px;">
					<b>Пол:</b>	
				</div>
				<div>
					<?=$sex?>
				</div>		
				<?php if(isset($town) && $town != '') { ?>
				<div class="clearfix"></div>
				<div style="float:left;width:100px;">
					<b>Родной город:</b>
				</div>
				<div>
					<?=$town?>
				</div>				
				<div class="clearfix"></div>
				<?php } ?>
				<?php if(isset($car) && $car != '') { ?>				
				<div style="float:left;width:100px;">
					<b>Автомобиль:</b>
				</div>
				<div>
					<?=$car?>
				</div>				
				<div class="clearfix"></div>
				<?php } ?>
				<?php if($this->session->userdata('logged_in')) { 
				if(isset($phone) && !isset($phone2)) {
				?>
				<div style="float:left;width:100px;">
					<b>Телефон:</b>
				</div>
				<div>
					<?=$phone?>
				</div>				
				<div class="clearfix"></div>
				<?php } else { 
				if($phone2 != '') { ?>
				<div style="float:left;width:100px;">
					<b>Телефоны:</b>
				</div>
				<div>
					<?=$phone2?>
				</div>
				<div class='clearfix'></div>
				<?php } ?>
				<?php if($phone3 != '') { ?>
				<div style="float:left;width:100px;">
					&nbsp;
				</div>
				<div>
					<?=$phone3?>
				</div>
				<div class='clearfix'></div>
				<?php } ?>
				<?php if($phone4 != '') { ?>
				<div style="float:left;width:100px;">
					&nbsp;
				</div>
				<div>
					<?=$phone4?>
				</div>
				<div class='clearfix'></div>
				<?php } ?>
				<?php if($phone5 != '') { ?>
				<div style="float:left;width:100px;">
					&nbsp;
				</div>
				<div>
					<?=$phone5?>
				</div>
				<div class='clearfix'></div>
				<?php } ?>
				
				
				<?php
			} } 
			if(!isset($my_page)) {
					echo '<div style="padding-top:10px;"><a class="btn" href="/msg/send/'.$id.'">Отправить сообщение</a></div>';	
					}
			?>
			</div>			
		</div>
		<div class="span5">
			<table class="table table-bordered table-striped table-hover" id="block">  
			  <thead>
				<tr>
				  <th><span>Активные поездки: </span></th>			 
				</tr>
			  </thead>
			  <tbody>
				<?php
				$i = 0;
				$active = null;
				if(isset($routes_active)) { 
					foreach($routes_active as $item) {
						if(date('Y-m-d') <= $item['date']) {
							$i++;							
							$active .= '<tr><td><a href="/route/view/'.$item['id'].'">Из <b>'.$item['from'].'</b> в <b>'.$item['to'].'</b></a></td></tr>';
						} 
					}
				}
				if($i > 0) {
					echo $active;
				} else {
					echo "<tr><td>Вы никуда не едете в ближайшее время!</td><tr>";
				}
				?>
			  </tbody>
			</table>		
		</div>
		<div class="span4">
			<h4>История поездок</h4>
			<?php
			$i = 0;
			$active = null;
			if(isset($routes_active)) {
				foreach($routes_active as $item) {
					if(date('Y-m-d') > $item['date']) {
						$i++;
						$active .= '<p><a href="/route/view/'.$item['id'].'">Из <b>'.$item['from'].'</b> в <b>'.$item['to'].'</b></a></p>';
				} 
			}
			}
			if($i > 0) {
				echo $active;
			} else {
				echo 	'<div class="alert alert-error">
							Еще не было совершено поездок!
						</div>';
			}
			?>
			
		</div>
	</div>
<div class="hFooter"></div>
</div>

<?php echo $this->load->view('_layout/footer'); ?>

<script src="/js/objects.js"></script>
<script>
$(document).ready(function() {
$('.route').tooltip().html();
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