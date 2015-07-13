<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Мои объявления поездок - Нам по пути</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>	
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
		<div class="span3">
			&nbsp;
		</div>
		<div class="span5 login-top">			
			<div class="pull-right"><?=$form_login;?></div>
		</div>
	</div>	
	<div class="row-fluid hr">
		<h3>Мои объявления</h3>
	</div>			
	<div class="row-fluid" style="padding-top:20px;">
		<div class="span12">		
			<?php 
			if(isset($routes_active)) {
			?>
			<table class="table table-bordered table-striped">
			   <thead>
				<tr>
				  <th colspan="3" style="background:#024e68;color:#fff;"><span>Перечень</span></th>			 
				</tr>				
			  </thead>
			  <tbody>	
			<?php
				foreach($routes_active as $item) {
			?>						
					<tr>
						<td class="span1">
						<?php if($item['date'] >= date('Y-m-d')) { ?>
                                                    <span class="label label-success">Активно</span></td><td><b><a href="/route/view/<?=$item['id']?>"><?=$item['from']?></b> &rarr;  <b><?=$item['to']?></b></a>
						<?php } else { ?>
						<span class="label">Не активно</span></td><td> <b><?=$item['from']?></b> &rarr;  <b><?=$item['to']?></b>
						<?php } ?>						
						</td>	
						<td style="width:20px;">									
							<a href="/board/delete/<?=$item['id']?>" class="btn btn-mini"><i class="icon-remove"></i></a>
						</td>
					</tr>
			<?php
				} 
			?>
			 </tbody>
			</table>
			<?=$this->pagination->create_links();?>
			<?php
			} else { 
				echo 	'<div class="alert alert-error">
							Вы еще не публиковали объявления!
						</div>';
			}
			?>			
		</div>
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