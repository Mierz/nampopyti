<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Редактирование марштура - Нам по пути</title>
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
	<link href="/css/bootstrap.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">	
</head>
<body>

<div class="container test_main">
	<div class="row-fluid visible-desktop">
		<div class="span4">
			<a href="/"><img src="/img/logo.png" alt="Нам по пути" /></a>
		</div>
		<div class="span3 visible-desktop">
			&nbsp;
		</div>
		<div class="span5" style="margin-top:30px;">			
			<div class="pull-right"><?=$form_login;?></div>
		</div>
	</div>
	
	<div class="row hr">
	<h3>ыв</h3>
	</div>
	
	
	<div class="row-fluid" style="padding-top:20px;">
		<div class="span12">df
		</div>
	</div>
<div class="hFooter"></div>
</div>

<div class="container" style="margin-top: -250px;">
	<div class="row-fluid visible-desktop">
		<div class="span3 footer-driver"></div>
		<div class="span3 footer-pass"></div>
		<div class="span3"></div>
		<div class="span3"></div>
		<div class="clearfix"></div>
		<div class="footer">			
			<div class="span3 f-driver-block">
			<p><b>Для водителей</b></p>
			<p>Наш сервис позволит набрать пассажиров в режиме онлайн разделив не только расходы, а и впечатления от поездки</p>
			</div>
			<div class="span3 f-pass-block">
			<p><b>Для пассажиров</b></p>
			<p>Наш сервис поможет найти выезжающий транспорт по необходимому Вам маршруту</p>
			</div>
			<div class="span3 f-map">
			<p><b>Карта сайта:</b></p>
			<ul>
				<li><a href="/page/about/">О сервисе</a></li>
				<li><a href="/page/rules/">Правила пользования сайтом</a></li>
				<li><a href="/page/agreement/">Конфиденциальное соглашение</a></li>
				<li><a href="/page/contacts/">Контакты</a></li>
			</ul>
			</div>
			<div class="span3 r-bottom">
				<div style="margin-top:30px;"><a href="/"><img src="/img/footer-logo.png" alt="Нам по пути" /></a></div>
				<p style="margin-top:20px;"><b>Мы в социальных сетях:</b></p>
				<p><a href="https://twitter.com/nampopyti" target="_blank"><img src="/img/twitter2.png" alt="Наш аккаунт в твиттере" /></a> <a href="http://vk.com/nampopyti_com" target="_blank"><img src="/img/vk2.png" alt="Мы Вконтакте" /></a> <a href="http://www.odnoklassniki.ru/group/51714384003220" target="_blank"><img src="/img/odnk2.png" alt="Мы в Одноклассниках" /></a></p>
			</div>
		</div>
	</div>
	<div class="row-fluid m-top">
		<div class="copy">
			<p>Все права принадлежат <a href="/">nampopyti.com</a> &copy; 2013</p>
		</div>
	</div>	
</div>

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