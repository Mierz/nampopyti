<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Личные сообщения - Нам по пути</title>
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
			<div class="description-text">сервис объединяющий водителей и пассажиров</div>
		</div>
		<div class="span3">
			&nbsp;
		</div>
		<div class="span5 login-top">			
			<div class="pull-right" id="navlink"><?=$form_login;?></div>
		</div>
	</div>	
	<div class="row hr">
		<h3>Личные сообщения</h3>
	</div>		
	<div class="row-fluid" style="padding-top:20px;">
		<div class="span12">		
			<?php
			if($list) {
			?>		
			<table class="table table-bordered table-striped">
			   <thead>
				<tr>
				  <th colspan="4" style="background:#024e68;color:#fff;"><span>Входящие</span></th>			 
				</tr>				
			  </thead>
			  <tbody>
				<?php				
				foreach($list as $item) {
				?>
					<tr <?php 
							if($item['read'] == null) { echo "style='font-weight:bold;'"; }
						?>	>
						<td class="span3"><?=$item['surname']?> <?=$item['name']?></td>
						<td>
							<a href="/msg/view/<?=$item['id']?>"><?=$item['title']?></a>
						</td>
						<td class="span3"><?=$item['date']?> в <?=$item['time']?></td>
						<td class="span1"><a href="/msg/delete/<?=$item['id']?>" class="btn btn-mini"><i class="icon-remove"></i></a></td>
					</tr>
				<?php
					}					
				?>
			  </tbody>
			</table>
        	<?=$this->pagination->create_links();?>
			<?php } else { ?>
			<div class="alert alert-error">
				Ваш ящик пуст!
			</div>
			<?php } ?>
			
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