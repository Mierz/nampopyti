<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Написать сообщение - Нам по пути</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
	<script src="/js/bootstrap.validate.js"></script>
    <script src="/js/bootstrap.validate.ru.js"></script>	
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container test_main">
	<div class="row-fluid visible-desktop">
		<div class="span4">
			<a href="http://nampopyti,com/"><img src="/img/logo.png"></a>
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
	<h3>Написать сообщение</h3>	
	</div>		
	<div class="row-fluid" style="padding-top:20px;">	
		<div class="span8">    				
			<?php echo form_error('msg'); ?>
			<form action="/msg/send/<?=$id?>" method="post" id="msg">
			<p>Тема</p>
			<p><input type="text" validate="required" class="span10" name="title" maxlength="50" /></p>
			<p>Сообщение</p>	
			<p><textarea style="height:100px;" class="span10" validate="required" name="msg"></textarea></p>
			<p><input type="submit" class="btn" value="Написать" /></p>
			<?php echo form_close();?>						
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
<script>
$(document).ready(function() {
$('#msg').bt_validate();
});
</script>	
</body>
</html>