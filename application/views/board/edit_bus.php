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
				<div class="pull-left span2">
				<div id="shel1" ><input type="text" class="span10" id="si1" value="<?php if(isset($data['shelude'][0])) { echo $data['shelude'][0]; } ?>" name="si1" /></div>
				<div id="shel2" ><input type="text" class="span10" id="si2" value="<?php if(isset($data['shelude'][1])) { echo $data['shelude'][1]; } ?>" name="si2" /></div>
				<div id="shel3" ><input type="text" class="span10" id="si3" value="<?php if(isset($data['shelude'][2])) { echo $data['shelude'][2]; } ?>"name="si3" /></div>
				<div id="shel4" ><input type="text" class="span10" id="si4" value="<?php if(isset($data['shelude'][3])) { echo $data['shelude'][3]; } ?>" name="si4" /></div>
				<div id="shel5" ><input type="text" class="span10" id="si5" value="<?php if(isset($data['shelude'][4])) { echo $data['shelude'][4]; } ?>" name="si5" /></div>
				<div id="shel6" ><input type="text" class="span10" id="si6" value="<?php if(isset($data['shelude'][5])) { echo $data['shelude'][5]; } ?>" name="si6" /></div>
				<div id="shel7" ><input type="text" class="span10" id="si7" value="<?php if(isset($data['shelude'][6])) { echo $data['shelude'][6]; } ?>" name="si7" /></div>
				<div id="shel8" ><input type="text" class="span10" id="si8" value="<?php if(isset($data['shelude'][7])) { echo $data['shelude'][7]; } ?>" name="si8" /></div>
				<div id="shel9" ><input type="text" class="span10" id="si9" value="<?php if(isset($data['shelude'][8])) { echo $data['shelude'][8]; } ?>" name="si9" /></div>
				<div id="shel10" ><input type="text" class="span10" id="si10" value="<?php if(isset($data['shelude'][9])) { echo $data['shelude'][9]; } ?>" name="si10" /></div>				
			</div>
			
			<div class="pull-left span2">
				<div id="shel11" ><input type="text" class="span10" id="si11" value="<?php if(isset($data['shelude'][10])) { echo $data['shelude'][10]; } ?>" name="si11" /></div>
				<div id="shel12" ><input type="text" class="span10" id="si12" value="<?php if(isset($data['shelude'][11])) { echo $data['shelude'][11]; } ?>" name="si12" /></div>
				<div id="shel13" ><input type="text" class="span10" id="si13" value="<?php if(isset($data['shelude'][12])) { echo $data['shelude'][12]; } ?>" name="si13" /></div>
				<div id="shel14" ><input type="text" class="span10" id="si14" value="<?php if(isset($data['shelude'][13])) { echo $data['shelude'][13]; } ?>" name="si14" /></div>
				<div id="shel15" ><input type="text" class="span10" id="si15" value="<?php if(isset($data['shelude'][14])) { echo $data['shelude'][14]; } ?>" name="si15" /></div>
				<div id="shel16" ><input type="text" class="span10" id="si16" value="<?php if(isset($data['shelude'][15])) { echo $data['shelude'][15]; } ?>" name="si16" /></div>
				<div id="shel17" ><input type="text" class="span10" id="si17" value="<?php if(isset($data['shelude'][16])) { echo $data['shelude'][16]; } ?>" name="si17" /></div>
				<div id="shel18" ><input type="text" class="span10" id="si18" value="<?php if(isset($data['shelude'][17])) { echo $data['shelude'][17]; } ?>" name="si18" /></div>
				<div id="shel19" ><input type="text" class="span10" id="si19" value="<?php if(isset($data['shelude'][18])) { echo $data['shelude'][18]; } ?>" name="si19" /></div>
				<div id="shel20" ><input type="text" class="span10" id="si20" value="<?php if(isset($data['shelude'][19])) { echo $data['shelude'][19]; }?>" name="si20" /></div>
			</div>
			<div class="clearfix"></div>	
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
	var cnt = 1;
	$("#add-point").click(function () {
		if(cnt == 1) {
			$("#point1").removeClass("disp-none");
			$("#delete-point").removeClass("disabled");
		}
		if(cnt == 2) {
			$("#point2").removeClass("disp-none");
		}
		if(cnt == 3) {
			$("#point3").removeClass("disp-none");
		}
		if(cnt == 4) {
			$("#point4").removeClass("disp-none");
		}
		if(cnt == 5) {
			$("#point5").removeClass("disp-none");
		}
		if(cnt == 6) {
			$("#point6").removeClass("disp-none");
			$("#add-point").addClass("disabled");			
		}
		cnt++;
	});
	$("#delete-point").click(function () {
		if(cnt == 2) {
			$("#point1").addClass("disp-none");
			$("#delete-point").addClass("disabled");
			$("#add-point").removeClass("disabled");
			delPoint();
		}
		if(cnt == 3) {
			$("#point2").addClass("disp-none");
			delPoint();
		}
		if(cnt == 4) {
			$("#point3").addClass("disp-none");
			delPoint();
		}
		if(cnt == 5) {
			$("#point4").addClass("disp-none");
			delPoint();
		}
		if(cnt == 6) {
			$("#point5").addClass("disp-none");
			delPoint();
		}
		if(cnt == 7) {
			$("#point6").addClass("disp-none");
			delPoint();
		}
		cnt = cnt - 1;
	});
		$("#si1").mask("99:99");
		$("#si2").mask("99:99");
		$("#si3").mask("99:99");
		$("#si4").mask("99:99");
		$("#si5").mask("99:99");
		$("#si6").mask("99:99");
		$("#si7").mask("99:99");
		$("#si8").mask("99:99");
		$("#si9").mask("99:99");
		$("#si10").mask("99:99");
		$("#si11").mask("99:99");
		$("#si12").mask("99:99");
		$("#si13").mask("99:99");
		$("#si14").mask("99:99");
		$("#si15").mask("99:99");
		$("#si16").mask("99:99");
		$("#si17").mask("99:99");
		$("#si18").mask("99:99");
		$("#si19").mask("99:99");
		$("#si20").mask("99:99");
	var cnt2 = 1;
	$("#add-shelude").click(function () {
		if(cnt2 == 1) {
			$("#shel1").removeClass("disp-none");
			$("#delete-shelude").removeClass("disabled");
		}
		if(cnt2 == 2) {
			$("#shel2").removeClass("disp-none");
		}
		if(cnt2 == 3) {
			$("#shel3").removeClass("disp-none");
		}
		if(cnt2 == 4) {
			$("#shel4").removeClass("disp-none");
		}
		if(cnt2 == 5) {
			$("#shel5").removeClass("disp-none");
		}
		if(cnt2 == 6) {
			$("#shel6").removeClass("disp-none");		
		}
		if(cnt2 == 7) {
			$("#shel7").removeClass("disp-none");		
		}
		if(cnt2 == 8) {
			$("#shel8").removeClass("disp-none");		
		}
		if(cnt2 == 9) {
			$("#shel9").removeClass("disp-none");		
		}
		if(cnt2 == 10) {
			$("#shel10").removeClass("disp-none");			
		}
		if(cnt2 == 11) {
			$("#shel11").removeClass("disp-none");		
		}
		if(cnt2 == 12) {
			$("#shel12").removeClass("disp-none");		
		}
		if(cnt2 == 13) {
			$("#shel13").removeClass("disp-none");			
		}
		if(cnt2 == 14) {
			$("#shel14").removeClass("disp-none");		
		}
		if(cnt2 == 15) {
			$("#shel15").removeClass("disp-none");		
		}
		if(cnt2 == 16) {
			$("#shel16").removeClass("disp-none");			
		}
		if(cnt2 == 17) {
			$("#shel17").removeClass("disp-none");		
		}
		if(cnt2 == 18) {
			$("#shel18").removeClass("disp-none");			
		}
		if(cnt2 == 19) {
			$("#shel19").removeClass("disp-none");		
		}
		if(cnt2 == 20) {
			$("#shel20").removeClass("disp-none");
			$("#add-shelude").addClass("disabled");			
		}		
		cnt2++;
	});
	$("#delete-shelude").click(function () {
		if(cnt2 == 2) {
			$("#shel1").addClass("disp-none");
			$("#delete-shelude").addClass("disabled");
			$("#add-shelude").removeClass("disabled");
		}
		if(cnt2 == 3) {
			$("#shel2").addClass("disp-none");
		}
		if(cnt2 == 4) {
			$("#shel3").addClass("disp-none");
		}
		if(cnt2 == 5) {
			$("#shel4").addClass("disp-none");
		}
		if(cnt2 == 6) {
			$("#shel5").addClass("disp-none");
		}
		if(cnt2 == 7) {
			$("#shel6").addClass("disp-none");
		}
		if(cnt2 == 8) {
			$("#shel7").addClass("disp-none");
		}
		if(cnt2 == 9) {
			$("#shel8").addClass("disp-none");
		}
		if(cnt2 == 10) {
			$("#shel9").addClass("disp-none");
		}
		if(cnt2 == 11) {
			$("#shel10").addClass("disp-none");
		}
		if(cnt2 == 12) {
			$("#shel11").addClass("disp-none");
		}
		if(cnt2 == 13) {
			$("#shel12").addClass("disp-none");
		}
		if(cnt2 == 14) {
			$("#shel13").addClass("disp-none");
		}
		if(cnt2 == 15) {
			$("#shel14").addClass("disp-none");
		}
		if(cnt2 == 16) {
			$("#shel15").addClass("disp-none");
		}
		if(cnt2 == 17) {
			$("#shel16").addClass("disp-none");
		}
		if(cnt2 == 18) {
			$("#shel17").addClass("disp-none");
		}
		if(cnt2 == 19) {
			$("#shel18").addClass("disp-none");
		}
		if(cnt2 == 20) {
			$("#shel19").addClass("disp-none");
		}
		if(cnt2 == 21) {
			$("#shel20").addClass("disp-none");
		}
		cnt2 = cnt2 - 1;
	});
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