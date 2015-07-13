<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Добавить маршрутное такси - Нам по пути</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/bootstrap.validate.js"></script>
    <script src="/js/bootstrap.validate.ru.js"></script>	
	<script src="/js/bootstrap-datepicker.js"></script>		
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<script src="/js/map_add.js"></script>
	<script src="/js/jquery.maskedinput.min.js" type="text/javascript"></script>	
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/datepicker.css" rel="stylesheet">
	<style>
	.show { display:block; }
	.none { display:none; }
	</style>	
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
	
	<?php 
			if(validation_errors())
			{
				echo '<div class="alert alert-error"><p>' . validation_errors() . '</p></div>'; 
			}
			?>	
	
	<form action="/route/bus" method="post" id="add_driver_form">
	
	<input type="hidden" name="group" value="2" />
	
	<div class="row-fluid m-top">
		
		<div class="span6">
		
			<div class="control-group">
			<label class="control-label" for="from"><b>От</b></label>
			<div class="controls">
			  <input type="text" style="width:95%" id="add-from" data-provide="typeahead" autocomplete="off" validate="required" name="ffrom" placeholder="От">
			</div>
		</div>
		 <div class="control-group">
			<label class="control-label" for="to"><b>Куда</b></label>
				<div class="controls">
				  <input type="text" style="width:95%" id="add-to" data-provide="typeahead" autocomplete="off" validate="required" name="fto" placeholder="Куда">
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
				<label class="control-label" for="seats"><b>Количество мест</b></label>
				<div class="controls">
				  <input type="number" id="seats"  class="span3" name="seats" placeholder="Количество мест" validate="required|number|min,0">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="price"><b>Цена за место</b></label>
				<div class="controls">
					<div class="input-append">
						<input type="number" class="span6" id="price" name="price" validate="required|number|min,0"" placeholder="Цена за место"><span class="add-on">грн.</span>
					</div>
				</div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label" for="pos"><b>Точка отправления</b></label>
				<div class="controls">
				  <input type="text" style="width:95%" id="pos" name="pos" placeholder="Точка отправления" validate="required">
				</div>
			  </div>
			  
			   <div class="control-group">
				<label class="control-label" for="poa"><b>Точка прибытия</b></label>
				<div class="controls">
				  <input type="text" style="width:95%" id="poa" name="poa" placeholder="Точка прибытия" validate="required">
				</div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label" for="comment"><b>Комментарий</b></label>
				<div class="controls">
				  <textarea style="width:95%" style="resize:none;" id="comment" name="comment" rows="5"></textarea>
				  <span id="count-2"></span>
				</div>
			  </div>
		
		</div>
		<div class="span6">
			<div style="width:70px;float:left;margin-right:5px;">
				<label><b>От</b></label>
				<select id="ot" class="span12">
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
			</div>
			<div style="width:70px;float:left;margin-right:5px;">
				<label><b>До</b></label>
				<select id="do" class="span12">
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
			</div>
			<div style="width:100px;float:left;margin-right:5px;">
				<label><b>Через</b></label>
				<select id="prom" class="span12">
					<option value="15">15 мин</option>
					<option value="30">30 мин</option>
					<option value="60">1 час</option>
				</select>
			</div>
			<div class="clearfix"></div>
			<p><a href="#" class="btn" id="route_time">Построить график</a></p>
			
			<label class="control-label none" id="time_title"><b>График отправления</b></label>

			<div class="none" id="time_field_1"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_1" /><a href="#" class="btn pull-right" onclick="close_one_field(1);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_2"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_2" /><a href="#" class="btn pull-right" onclick="close_one_field(2);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_3"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_3" /><a href="#" class="btn pull-right" onclick="close_one_field(3);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_4"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_4" /><a href="#" class="btn pull-right" onclick="close_one_field(4);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_5"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_5" /><a href="#" class="btn pull-right" onclick="close_one_field(5);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_6"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_6" /><a href="#" class="btn pull-right" onclick="close_one_field(6);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_7"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_7" /><a href="#" class="btn pull-right" onclick="close_one_field(7);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_8"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_8" /><a href="#" class="btn pull-right" onclick="close_one_field(8);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_9"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_9" /><a href="#" class="btn pull-right" onclick="close_one_field(9);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_10"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_10" /><a href="#" class="btn pull-right" onclick="close_one_field(10);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_11"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_11" /><a href="#" class="btn pull-right" onclick="close_one_field(11);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_12"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_12" /><a href="#" class="btn pull-right" onclick="close_one_field(12);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_13"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_13" /><a href="#" class="btn pull-right" onclick="close_one_field(13);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_14"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_14" /><a href="#" class="btn pull-right" onclick="close_one_field(14);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_15"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_15" /><a href="#" class="btn pull-right" onclick="close_one_field(15);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_16"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_16" /><a href="#" class="btn pull-right" onclick="close_one_field(16);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_17"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_17" /><a href="#" class="btn pull-right" onclick="close_one_field(17);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_18"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_18" /><a href="#" class="btn pull-right" onclick="close_one_field(18);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_19"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_19" /><a href="#" class="btn pull-right" onclick="close_one_field(19);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_20"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_20" /><a href="#" class="btn pull-right" onclick="close_one_field(20);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_21"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_21" /><a href="#" class="btn pull-right" onclick="close_one_field(21);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_22"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_22" /><a href="#" class="btn pull-right" onclick="close_one_field(22);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_23"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_23" /><a href="#" class="btn pull-right" onclick="close_one_field(23);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_24"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_24" /><a href="#" class="btn pull-right" onclick="close_one_field(24);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_25"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_25" /><a href="#" class="btn pull-right" onclick="close_one_field(25);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_26"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_26" /><a href="#" class="btn pull-right" onclick="close_one_field(26);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_27"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_27" /><a href="#" class="btn pull-right" onclick="close_one_field(27);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_28"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_28" /><a href="#" class="btn pull-right" onclick="close_one_field(28);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_29"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_29" /><a href="#" class="btn pull-right" onclick="close_one_field(29);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_30"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_30" /><a href="#" class="btn pull-right" onclick="close_one_field(30);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_31"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_31" /><a href="#" class="btn pull-right" onclick="close_one_field(31);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_32"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_32" /><a href="#" class="btn pull-right" onclick="close_one_field(32);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_33"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_33" /><a href="#" class="btn pull-right" onclick="close_one_field(33);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_34"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_34" /><a href="#" class="btn pull-right" onclick="close_one_field(34);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_35"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_35" /><a href="#" class="btn pull-right" onclick="close_one_field(35);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_36"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_36" /><a href="#" class="btn pull-right" onclick="close_one_field(36);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_37"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_37" /><a href="#" class="btn pull-right" onclick="close_one_field(37);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_38"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_38" /><a href="#" class="btn pull-right" onclick="close_one_field(38);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_39"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_39" /><a href="#" class="btn pull-right" onclick="close_one_field(39);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_40"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_40" /><a href="#" class="btn pull-right" onclick="close_one_field(40);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_41"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_41" /><a href="#" class="btn pull-right" onclick="close_one_field(41);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_42"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_42" /><a href="#" class="btn pull-right" onclick="close_one_field(42);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_43"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_43" /><a href="#" class="btn pull-right" onclick="close_one_field(43);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_44"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_44" /><a href="#" class="btn pull-right" onclick="close_one_field(44);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_45"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_45" /><a href="#" class="btn pull-right" onclick="close_one_field(45);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_46"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_46" /><a href="#" class="btn pull-right" onclick="close_one_field(46);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_47"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_47" /><a href="#" class="btn pull-right" onclick="close_one_field(47);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_48"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_48" /><a href="#" class="btn pull-right" onclick="close_one_field(48);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_49"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_49" /><a href="#" class="btn pull-right" onclick="close_one_field(49);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_50"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_50" /><a href="#" class="btn pull-right" onclick="close_one_field(50);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_51"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_51" /><a href="#" class="btn pull-right" onclick="close_one_field(51);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_52"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_52" /><a href="#" class="btn pull-right" onclick="close_one_field(52);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_53"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_53" /><a href="#" class="btn pull-right" onclick="close_one_field(53);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_54"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_54" /><a href="#" class="btn pull-right" onclick="close_one_field(54);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_55"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_55" /><a href="#" class="btn pull-right" onclick="close_one_field(55);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_56"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_56" /><a href="#" class="btn pull-right" onclick="close_one_field(56);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_57"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_57" /><a href="#" class="btn pull-right" onclick="close_one_field(57);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_58"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_58" /><a href="#" class="btn pull-right" onclick="close_one_field(58);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_59"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_59" /><a href="#" class="btn pull-right" onclick="close_one_field(59);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_60"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_60" /><a href="#" class="btn pull-right" onclick="close_one_field(60);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_61"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_61" /><a href="#" class="btn pull-right" onclick="close_one_field(61);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_62"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_62" /><a href="#" class="btn pull-right" onclick="close_one_field(62);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_63"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_63" /><a href="#" class="btn pull-right" onclick="close_one_field(63);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_64"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_64" /><a href="#" class="btn pull-right" onclick="close_one_field(64);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_65"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_65" /><a href="#" class="btn pull-right" onclick="close_one_field(65);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_66"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_66" /><a href="#" class="btn pull-right" onclick="close_one_field(66);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_67"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_67" /><a href="#" class="btn pull-right" onclick="close_one_field(67);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_68"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_68" /><a href="#" class="btn pull-right" onclick="close_one_field(68);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_69"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_69" /><a href="#" class="btn pull-right" onclick="close_one_field(69);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_70"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_70" /><a href="#" class="btn pull-right" onclick="close_one_field(70);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_71"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_71" /><a href="#" class="btn pull-right" onclick="close_one_field(71);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_72"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_72" /><a href="#" class="btn pull-right" onclick="close_one_field(72);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_73"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_73" /><a href="#" class="btn pull-right" onclick="close_one_field(73);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_74"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_74" /><a href="#" class="btn pull-right" onclick="close_one_field(74);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_75"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_75" /><a href="#" class="btn pull-right" onclick="close_one_field(75);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_76"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_76" /><a href="#" class="btn pull-right" onclick="close_one_field(76);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_77"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_77" /><a href="#" class="btn pull-right" onclick="close_one_field(77);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_78"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_78" /><a href="#" class="btn pull-right" onclick="close_one_field(78);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_79"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_79" /><a href="#" class="btn pull-right" onclick="close_one_field(79);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_80"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_80" /><a href="#" class="btn pull-right" onclick="close_one_field(80);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_81"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_81" /><a href="#" class="btn pull-right" onclick="close_one_field(81);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_82"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_82" /><a href="#" class="btn pull-right" onclick="close_one_field(82);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_83"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_83" /><a href="#" class="btn pull-right" onclick="close_one_field(83);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_84"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_84" /><a href="#" class="btn pull-right" onclick="close_one_field(84);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_85"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_85" /><a href="#" class="btn pull-right" onclick="close_one_field(85);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_86"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_86" /><a href="#" class="btn pull-right" onclick="close_one_field(86);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_87"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_87" /><a href="#" class="btn pull-right" onclick="close_one_field(87);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_88"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_88" /><a href="#" class="btn pull-right" onclick="close_one_field(88);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_89"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_89" /><a href="#" class="btn pull-right" onclick="close_one_field(89);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_90"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_90" /><a href="#" class="btn pull-right" onclick="close_one_field(90);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_91"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_91" /><a href="#" class="btn pull-right" onclick="close_one_field(91);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_92"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_92" /><a href="#" class="btn pull-right" onclick="close_one_field(92);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_93"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_93" /><a href="#" class="btn pull-right" onclick="close_one_field(93);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_94"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_94" /><a href="#" class="btn pull-right" onclick="close_one_field(94);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_95"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_95" /><a href="#" class="btn pull-right" onclick="close_one_field(95);"><i class="icon-remove"></i></a></div></div>
			<div class="none" id="time_field_96"><div style="width:100px;margin-right:5px;"><input type="text" class="span7 pull-left" name="t_f_96" /><a href="#" class="btn pull-right" onclick="close_one_field(95);"><i class="icon-remove"></i></a></div></div>
		
			<div class="clearfix"></div>
		
			<!--<label class="control-label"><b>График отправления</b></label>
			<a class="btn" id="add-shelude" href="#"><i class="icon-plus"></i> Добавить</a>
			<a class="btn disabled" id="delete-shelude" href="#"><i class="icon-trash"></i> Удалить</a></p>
			<div class="pull-left span2">
				<div id="shel1" class="disp-none"><input type="text" class="span10" id="si1" name="si1" /></div>
				<div id="shel2" class="disp-none"><input type="text" class="span10" id="si2" name="si2" /></div>
				<div id="shel3" class="disp-none"><input type="text" class="span10" id="si3" name="si3" /></div>
				<div id="shel4" class="disp-none"><input type="text" class="span10" id="si4" name="si4" /></div>
				<div id="shel5" class="disp-none"><input type="text" class="span10" id="si5" name="si5" /></div>
				<div id="shel6" class="disp-none"><input type="text" class="span10" id="si6" name="si6" /></div>
				<div id="shel7" class="disp-none"><input type="text" class="span10" id="si7" name="si7" /></div>
				<div id="shel8" class="disp-none"><input type="text" class="span10" id="si8" name="si8" /></div>
				<div id="shel9" class="disp-none"><input type="text" class="span10" id="si9" name="si9" /></div>
				<div id="shel10" class="disp-none"><input type="text" class="span10" id="si10" name="si10" /></div>				
			</div>
			
			<div class="pull-left span2">
				<div id="shel11" class="disp-none"><input type="text" class="span10" id="si11" name="si11" /></div>
				<div id="shel12" class="disp-none"><input type="text" class="span10" id="si12" name="si12" /></div>
				<div id="shel13" class="disp-none"><input type="text" class="span10" id="si13" name="si13" /></div>
				<div id="shel14" class="disp-none"><input type="text" class="span10" id="si14" name="si14" /></div>
				<div id="shel15" class="disp-none"><input type="text" class="span10" id="si15" name="si15" /></div>
				<div id="shel16" class="disp-none"><input type="text" class="span10" id="si16" name="si16" /></div>
				<div id="shel17" class="disp-none"><input type="text" class="span10" id="si17" name="si17" /></div>
				<div id="shel18" class="disp-none"><input type="text" class="span10" id="si18" name="si18" /></div>
				<div id="shel19" class="disp-none"><input type="text" class="span10" id="si19" name="si19" /></div>
				<div id="shel20" class="disp-none"><input type="text" class="span10" id="si20" name="si20" /></div>
			</div>
			<div class="clearfix"></div>-->			
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
function view_field(id, ot, prom) {
	var va = parseInt(ot);
	var tt = va;
	var nn = 0;
	for(i = 1; i <= id; i++) {
		nn = nn + parseInt(prom);
		$("#time_field_" + i).removeClass("none");		
		$("#time_field_" + i).addClass("pull-left");	
		
		if(nn == 60) {
			tt++;
			nn = 0;
		}
		$("input[name='t_f_"+ i +"']").val(tt + ":" +nn);
	}
}

function close_field(id) {
	for(i = 1; i <= id; i++) {
		$("#time_field_" + i).addClass("none");
	}
}

function close_one_field(id) {
	$("#time_field_" + id).hide();  
}
</script>	
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
	$('#date').datepicker();	
	$('#date_return').datepicker();
	if($("#anytime").prop("checked")) {
		$("#min").attr("disabled", true);
		$("#hour").attr("disabled", true);
		$("#dop").attr("disabled", true);
	};
	
	$("#route_time").click(function () {
		close_field(96);
		$("#time_title").removeClass("none");		
		var ot = $("#ot").val();
		var doo = $("#do").val();
		if(ot < doo) {
			var prom = $("#prom").val();
			var result = (doo - ot) * 60 / prom;
			view_field(result, ot, prom);
		}
	});
	
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
	
	$("#anytime_return").click(function () {
		if($("#anytime_return").prop("checked")) {
			$("#min_return").attr("disabled", true);
			$("#hour_return").attr("disabled", true);
			$("#dop_return").attr("disabled", true);
		} else {
			$("#min_return").removeAttr("disabled", true);
			$("#hour_return").removeAttr("disabled", true);
			$("#dop_return").removeAttr("disabled", true);		
		}
	});
	
	$("#return").click(function () {
		if($("#return").prop("checked")) {			
			$("#return_date").attr("disabled", true);
			$("#anytime_return").attr("disabled", true);
		} else {				
			$("#return_date").removeAttr("disabled", true);	
			$("#anytime_return").removeAttr("disabled", true);			
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