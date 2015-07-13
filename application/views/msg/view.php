<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Личное сообщение - Нам по пути</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container test_main">
	<div class="row-fluid visible-desktop">
		<div class="span4">
			<a href="http://nampopyti.com/"><img src="/img/logo.png"></a>
			<div class="description-text">сервис объединяющий водителей и пассажиров</div>
		</div>
		<div class="span3">
			&nbsp;
		</div>
		<div class="span5 login-top">			
			<div class="pull-right" id="navlink"><?=$form_login;?></div>
		</div>
	</div>	
	<div class="row-fluid hr">
		<?php
		foreach($msg as $item) {
			echo "<h3>Тема: " .$item['title'] . "</h3>";
		?>
	</div>		
	<div class="row-fluid" style="padding-top:20px;">	
		<div class="span12">
			<div class="well">
				<?php
				if(isset($item['photo'])) {
					echo '<div class="photo-msg-block"><img src="'.$item['photo'].'" class="img-rounded photo-msg"></div>';
				}
				else {
					echo '<div class="photo-msg-block"><img src="/img/no_photo.png" class="img-rounded photo-msg"></div>';
				}
				?>
				<div>
					<p><b>От:</b> <a href="/users/profile/<?=$item['from']?>"><?=$item['surname']?> <?=$item['name']?></a></p>
					<p><i class="icon-calendar"></i>&nbsp;<?=$item['date']?> в <?=$item['time']?></p>
				</div>
				<div class="clearfix"></div>
			</div>
			<h5>Сообщение</h5>
			<p><?=$item['text']?></p>
			<p><a href="/msg/send/<?=$item['from']?>" class="btn"><i class="icon-envelope"></i>&nbsp;Ответить</a> <a href="/msg/delete/<?=$item['id']?>" class="btn"><i class="icon-remove"></i>&nbsp;Удалить</a></p>
		</div>
	</div>	
	<?php
		}
	?>
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