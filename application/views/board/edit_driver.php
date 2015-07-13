<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Редактирование марштура - Нам по пути</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/bootstrap.validate.js"></script>
    <script src="/js/bootstrap.validate.ru.js"></script>	
	<script src="/js/bootstrap-datepicker.js"></script>		
	<script src="/js/jquery.maskedinput.min.js" type="text/javascript"></script>	
	<link href="/css/bootstrap.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">	
</head>

<body>

<div class="container test_main">
	<div class="row-fluid visible-desktop">
		<div class="span4">
			<a href="/"><img src="/img/logo.png"></a>
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
				<input class="btn" type="submit" value="Найти">
			</form>	
			
		</div>			
	</div>
	<h3>Редактирование маршрута</h3>

	<select multiple id="my_select" style="display:none;" size="5">
	</select>
	
	<?php 
			if(validation_errors())
			{
				echo '<div class="alert alert-error"><p>' . validation_errors() . '</p></div>'; 
			}
			?>	
	
	<form action="/board/edit/<?=$id?>" method="post" id="add_driver_form">
	
	<input type="hidden" name="group" value="2" />
	
	<div class="row-fluid m-top">
		
		<div class="span6">
			<div class="control-group">
			<label class="control-label" for="from"><b>От</b></label>
			<div class="controls">
			  <input type="text" style="width:95%" id="add-from" data-provide="typeahead" autocomplete="off" validate="required" value="<?=$data['from'];?>" name="ffrom" placeholder="От">
			</div>
		</div>
		 <div class="control-group">
			<label class="control-label" for="to"><b>Куда</b></label>
				<div class="controls">
				  <input type="text" style="width:95%" id="add-to" data-provide="typeahead" autocomplete="off" validate="required" value="<?=$data['to'];?>" name="fto" placeholder="Куда">
			</div>
			 </div>
			 <div id="point1" > <input style="width:95%" id="p1" type="text" data-provide="typeahead" autocomplete="off" name="p1" value="<?php if(isset($data['p1'])) { echo $data['p1']; } ?>" placeholder="Точка 1" /></div>
			 <div id="point2" > <input style="width:95%" id="p2" type="text" data-provide="typeahead" autocomplete="off" name="p2" value="<?php if(isset($data['p2'])) { echo $data['p2']; } ?>" placeholder="Точка 2" /></div>
			 <div id="point3" > <input style="width:95%" id="p3" type="text" data-provide="typeahead" autocomplete="off" name="p3" value="<?php if(isset($data['p3'])) { echo $data['p3']; } ?>" placeholder="Точка 3" /></div>
			 <div id="point4" > <input style="width:95%" id="p4" type="text" data-provide="typeahead" autocomplete="off" name="p4" value="<?php if(isset($data['p4'])) { echo $data['p4']; } ?>" placeholder="Точка 4" /></div>
			 <div id="point5" > <input style="width:95%" id="p5" type="text" data-provide="typeahead" autocomplete="off" name="p5" value="<?php if(isset($data['p5'])) { echo $data['p5']; } ?>" placeholder="Точка 5" /></div>
			 <div id="point6" > <input style="width:95%" id="p6" type="text" data-provide="typeahead" autocomplete="off" name="p6" value="<?php if(isset($data['p6'])) { echo $data['p6']; } ?>" placeholder="Точка 6" /></div>
			 <div><p>
			 
			 </div>
			
			  <div class="control-group">
				<label class="control-label" for="seats"><b>Количество мест</b></label>
				<div class="controls">
				  <input type="number" id="seats"  class="span3" name="seats" value="<?=$data['seats'];?>" placeholder="Количество мест" validate="required|number|min,0">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="price"><b>Цена за место</b></label>
				<div class="controls">
					<div class="input-append">
						<input type="number" class="span6" id="price" name="price" value="<?=$data['price'];?>" validate="required|number|min,0"" placeholder="Цена за место"><span class="add-on">грн.</span>
					</div>
				</div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label" for="pos"><b>Точка отправления</b></label>
				<div class="controls">
				  <input type="text" style="width:95%" id="pos" name="pos" value="<?=$data['pos'];?>" placeholder="Точка отправления" validate="required">
				</div>
			  </div>
			  
			   <div class="control-group">
				<label class="control-label" for="poa"><b>Точка прибытия</b></label>
				<div class="controls">
				  <input type="text" style="width:95%" id="poa" name="poa" value="<?=$data['poa'];?>" placeholder="Точка прибытия" validate="required">
				</div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label" for="comment"><b>Комментарий</b></label>
				<div class="controls">
				  <textarea style="width:95%" style="resize:none;" id="comment" name="comment" rows="5"><?=$data['comment'];?></textarea>
				  <span id="count-2"></span>
				</div>
			  </div>
		
		</div>
		<div class="span6">
			<label class="control-label"><b>График отправления</b></label>
			
		</div>		
</div>

<div class="row-fluid" style="margin-top:10px;">
	<div class="span12">
		 <p><button type="submit" class="btn">Сохранить изминения</button></p>
	</div>
</div>
		
</form>	
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
<script>
$(document).ready(function(){	
	$('#add_driver_form').bt_validate();
	$("#exchange").click(function () {	
		var to = $("input[name='to']").val();
		var from = $("input[name='from']").val();
		$("input[name='to']").val(from);
		$("input[name='from']").val(to);		
	});
	$('#exchange').tooltip();	
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