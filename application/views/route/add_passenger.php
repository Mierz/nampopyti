<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Добавит пассажира - Нам по пути</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/bootstrap.validate.js"></script>
    <script src="/js/bootstrap.validate.ru.js"></script>	
	<script src="/js/bootstrap-datepicker.js"></script>		
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/datepicker.css" rel="stylesheet">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<script src="/js/map_add.js"></script>
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
	
		<h3>Добавление маршрута</h3>
				
		<select multiple id="my_select" style="display:none;" size="5">
	</select>
			
	<form action="/route/passenger" method="post" id="add_pass_form">
		
	<input type="hidden" name="group" value="1" />
	
	<div class="row-fluid m-top">			
			
	<div class="span6">
	
		<div class="control-group">
			<label class="control-label" for="from"><b>От</b></label>
			<div class="controls">
			  <input type="text" style="width:95%" id="add-from" data-provide="typeahead" autocomplete="off" name="ffrom" validate="required" placeholder="От">
			</div>
		</div>
		 <div class="control-group">
			<label class="control-label" for="to"><b>Куда</b></label>
				<div class="controls">
				  <input type="text" style="width:95%" id="add-to" data-provide="typeahead" autocomplete="off" name="fto" validate="required" placeholder="Куда">
			</div>
			 </div>
			 <div id="point1" class="disp-none"> <input style="width:95%" id="p1" type="text" data-provide="typeahead" autocomplete="off" name="p1" placeholder="Точка 1" /></div>
			 <div id="point2" class="disp-none"> <input style="width:95%" id="p2" type="text" data-provide="typeahead" autocomplete="off" name="p2" placeholder="Точка 2" /></div>
			 <div id="point3" class="disp-none"> <input style="width:95%" id="p3" type="text" data-provide="typeahead" autocomplete="off" name="p3" placeholder="Точка 3" /></div>
			 <div id="point4" class="disp-none"> <input style="width:95%" id="p4" type="text" data-provide="typeahead" autocomplete="off" name="p4" placeholder="Точка 4" /></div>
			 <div id="point5" class="disp-none"> <input style="width:95%" id="p5" type="text" data-provide="typeahead" autocomplete="off" name="p5" placeholder="Точка 5" /></div>
			 <div id="point6" class="disp-none"> <input style="width:95%" id="p6" type="text" data-provide="typeahead" autocomplete="off" name="p6" placeholder="Точка 6" /></div>
			 <div><p>
			 <a class="btn" id="add-point" href="#"><i class="icon-plus"></i> Добавить промежуточный адресс</a></p>
			 <p><a class="btn disabled" id="delete-point" href="#"><i class="icon-trash"></i> Удалить промежуточный адресс</a></p>
			 </div>
			
		<div class="control-group">
			<label class="control-label" for="seats"><b>Количество пассажиров</b></label>
			<div class="controls">
			  <input type="number" class="span4" name="seats" validate="required|number|min,0"" placeholder="Количество пассажиров">
			</div>
		</div>
		
	
	</div>
	<div class="span6">
	
	<div class="control-group">
			<label class="control-label" for="date"><b>Отправляюсь</b></label>
				<div class="controls">
					  <div class="input-append date" id="date" data-date="<?=date('Y-m-d')?>" data-date-format="yyyy-mm-dd">
					  <input class="span12" id="date" name="date" validate="required" size="16" type="text" value="<?=date('Y-m-d')?>">
					  <span class="add-on"><i class="icon-calendar"></i></span>
					</div>
				</div>
			  </div>
	
	<div class="control-group">
		<label for="date"><b>Время</b></label>
		Часы: 
		<select class="span2" id="hour" name="hour">
			<option value="00">00</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
		</select>		
		Мин: 
		<select class="span2" id="min" name="min">
			<option value="00">00</option>
			<option value="05">05</option>
			<option value="10">10</option>
			<option value="15">15</option>
			<option value="20">20</option>
			<option value="25">25</option>
			<option value="30">30</option>
			<option value="35">35</option>
			<option value="40">40</option>
			<option value="45">45</option>
			<option value="50">50</option>
			<option value="55">55</option>
		</select>		
		+/-
		<select class="span4" id="dop" name="dop">
			<option value="5 мин">5 мин</option>
			<option value="10 мин">10 мин</option>
			<option value="15 мин">15 мин</option>
			<option value="30 мин">30 мин</option>
			<option value="45 мин">45 мин</option>
			<option value="1 час">1 час</option>
			<option value="1 час 30 мин">1 час 30 мин</option>
			<option value="2 часа">2 часа</option>
			<option value="2 часа 30 мин">2 часа 30 мин</option>
			<option value="3 часа">3 часа</option>
		</select>
		<p><label class="checkbox inline">
			<input type="checkbox" id="anytime" checked> Любое&nbsp;время
		</label></p>
	</div>
		
		
	
	</div>
		
</div>

<div class="row-fluid">
	<div class="span12">
		<h4>Маршрут на карте</h4>
		<div class="route-map" id="map-canvas">	</div>	
	</div>
</div>

<div class="row-fluid" style="margin-top:10px;">
	<div class="span12">
		 <p><button type="submit" class="btn">Сохранить маршрут</button></p>
	</div>
</div>
		
</form>	
	<div class="hFooter"></div>
</div>

<?php echo $this->load->view('_layout/footer'); ?>
	
<script>
$(document).ready(function(){	
	$('#add_pass_form').bt_validate();
	$("#exchange").click(function () {		
		var to = $("input[name='to']").val();
		var from = $("input[name='from']").val();
		$("input[name='to']").val(from);
		$("input[name='from']").val(to);		
	});
	$('#exchange').tooltip();	
	$('#date').datepicker();
	if($("#anytime").prop("checked")) {
		$("#min").attr("disabled", true);
		$("#hour").attr("disabled", true);
		$("#dop").attr("disabled", true);
	};
	
	$("#anytime").click(function () {
		if($("#anytime").prop("checked")) {
			$("#min").attr("disabled", true);
			$("#hour").attr("disabled", true);
			$("#dop").attr("disabled", true);
		} else {
			$("#min").removeAttr("disabled", true);
			$("#hour").removeAttr("disabled", true);
			$("#dop").removeAttr("disabled", true);		
		}
	});
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