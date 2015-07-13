<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Редактировать профиль пользователя - Нам по пути</title>
	 <script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/bootstrap.validate.js"></script>
    <script src="/js/bootstrap.validate.ru.js"></script>	
	<script src="/js/bootstrap-datepicker.js"></script>		
	<script src="/js/jquery.maskedinput.min.js" type="text/javascript"></script>
	<script src="/js/jquery.Jcrop.min.js"></script>
    <script src="/js/script.js"></script>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/jquery.Jcrop.min.css" rel="stylesheet" />
	<link href="/css/datepicker.css" rel="stylesheet">
	<style>
	.step2, .error {display: none;}
	.jcrop-holder {display: inline-block;}
	</style>
</head>
<body>

<div class="container test_main">
	<div class="row-fluid visible-desktop">
		<div class="span4">
			<a href="/"><img src="/img/logo.png"></a>
			<div class="description-text">сервис объединяющий водителей и пассажиров</div>
		</div>
		<div class="span3 visible-desktop">
			&nbsp;
		</div>
		<div class="span5" style="margin-top:30px;">			
			<div class="pull-right"><?=$form_login;?></div>
		</div>
	</div>
	
	<div class="row-fluid hr">
	<h3>Редактировать профиль</h3>
	</div>
			
	<div class="row-fluid" style="padding-top:20px;">
	
		<ul class="nav nav-tabs" style="margin:0;">
		  <li class="active"><a href="#all" data-toggle="tab">Общая информация</a></li>
		  <li><a href="#contact" data-toggle="tab">Контактная информация</a></li>
		  <li><a href="#photo" data-toggle="tab">Фото</a></li>
		</ul>
		
		<?php echo form_open('user/edit/'.$this->session->userdata('id').''); ?>

		<div class="tab-content" style="border-left:1px solid #dddddd;border-bottom:1px solid #dddddd;border-right:1px solid #dddddd;background:#f5f5f5;padding:20px;">
		  <div class="tab-pane active" id="all">
		  
		   <div class="control-group">
				<label class="control-label" for="name"><b>Имя:</b></label>
				<div class="controls">
				  <input type="text" class="span5" name="name" value="<?=$name?>" />
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="surname"><b>Фамилия</b></label>
				<div class="controls">
				  <input type="text" class="span5" name="surname" value="<?=$surname?>" />
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="town"><b>Родной город</b></label>
				<div class="controls">
				  <input type="text" class="span5" id="city" name="town" autocomplete="off" value="<?=$town?>" />
				</div>
			  </div>			
			<label class="control-label"><b>Дата рождения</b></label>			  
			<select class="span1" name="d">
				<?php for($i = 1; $i <= 31; $i++) { 
				if($i == $d) { ?>
					<option value="<?=$i?>" selected><?=$i?></option>
				<?php
				}
				else {
				?> 
				<option value="<?=$i?>"><?=$i?></option>
				<?php } } ?>
			</select>
			<select class="span2" name="m">		
				<?php
				$month = array ('','Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь');
				for($i = 1; $i <= 12; $i++) {
					if($i == $m) {
						echo "<option value=".$i." selected>".$month[$i]."</option>";
					}
					else {
						echo "<option value=".$i.">".$month[$i]."</option>";
					}
				}				
				?>
			</select>
			<select class="span2" name="y">
				<?php for($i = date('Y'); $i >= 1930; $i--) { 
				if($i == $y) { ?>
					<option value="<?=$i?>" selected><?=$i?></option>
				<?php
				}
				else {
				?> 
				<option value="<?=$i?>"><?=$i?></option>
				<?php } } ?>
			</select>
			  <div class="control-group">
				<label class="control-label" for="car"><b>Автомобиль</b></label>
				<div class="controls">
				  <input type="text" class="span5" name="car" value="<?=$car?>" />
				</div>
			  </div>
			  
			  <div class="control-group">
				<div class="controls">				  
				  <button type="submit" class="btn">Сохранить</button>
				</div>
			  </div>
		  
		  </div>
		  <div class="tab-pane" id="contact">
		  
		  <div class="control-group">
				<label class="control-label" for="phone"><b>Телефоны</b></label>
				<div class="controls">					
					<input type="text" id="phone" class="span2" name="phone" value="<?=$phone?>" />				  
				</div>	
			  </div>	
			<div class="control-group" id="pblock2">				
				<div class="controls">					
					<input type="text" id="phone2" class="span2" name="phone2" value="<?=$phone2?>" />				  
				</div>
			</div>		
			<div class="control-group" id="pblock3">				
				<div class="controls">					
					<input type="text" id="phone3" class="span2" name="phone3" value="<?=$phone3?>" />				  
				</div>
			</div>	
			<div class="control-group" id="pblock4">				
				<div class="controls">					
					<input type="text" id="phone4" class="span2" name="phone4" value="<?=$phone4?>" />				  
				</div>
			</div>		
			<div class="control-group" id="pblock5">				
				<div class="controls">					
					<input type="text" id="phone5" class="span2" name="phone5" value="<?=$phone5?>" />				  
				</div>
			</div>		
			  
			  <div class="control-group">
				<div class="controls">				  
				  <button type="submit" class="btn">Сохранить</button>
				</div>
			  </div>
			</form>
		  
		  </div>
		  <div class="tab-pane" id="photo">
		  
		  <?php
			if($photo != NULL) {
				echo "<img src='".$photo."' style='width:150px;height:150px;border:3px solid #e5e5e5;' class='img-rounded'>";
			}
			else {
				echo "<img src='/img/no_photo.png' style='width:150px;height:150px;border:3px solid #e5e5e5;' class='img-rounded'>";
			}
			?>
			
			 <form id="upload_form" enctype="multipart/form-data" method="post" action="/user/do_upload" onsubmit="return checkForm()">
                    <!-- hidden crop params -->
                    <input type="hidden" id="x1" name="x1" />
                    <input type="hidden" id="y1" name="y1" />
                    <input type="hidden" id="x2" name="x2" />
                    <input type="hidden" id="y2" name="y2" />

					<label class="control-label" for="name"><b>Шаг 1: Загрузить фото</b></label>
                    <div><input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()" /></div>

                    <div class="error"></div>

                    <div class="step2">
						<label class="control-label" for="name"><b>Шаг 2: Выберите желаемую область</b></label>
                        <img id="preview"  />
                        <p><input type="submit" class="btn" name="save" value="Сменить фото" /></p>
                    </div>
                </form>
		  
		  </div>
		</div>

	</div>
<div class="hFooter"></div>
</div>
	
<?php echo $this->load->view('_layout/footer'); ?>

<script>
$(document).ready(function(){
$("#phone").mask("(999) 999-99-99");
$("#phone2").mask("(999) 999-99-99");
$("#phone3").mask("(999) 999-99-99");
$("#phone4").mask("(999) 999-99-99");
$("#phone5").mask("(999) 999-99-99");
});
</script>	
<script src="/js/city.js"></script>	
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