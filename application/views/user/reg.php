<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><?=$this->lang->line('join')?> - <?=$this->lang->line('title')?></title>
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
	<h3><?=$this->lang->line('join')?></h3>
	</div>	
			
	<div class="row-fluid" style="padding-top:20px;">
		<div class="span6">
		
		<?php 
			if(validation_errors())
			{
				echo '<div class="alert alert-error"><p>' . validation_errors() . '</p></div>'; 
			}
			?>	
						
			<form action="/user/join" method="post" id="reg_form" class="form-horizontal">
			<input type="text" name="group" value="2" style="display:none;" />
			  <div class="control-group">
				<label class="control-label" for="name"><?=$this->lang->line('name')?></label>
				<div class="controls">
				  <input type="text" name="name" validate="required" value="<?php echo set_value('name'); ?>" maxlength="15" placeholder="<?=$this->lang->line('name')?>">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" validate="required" for="surname"><?=$this->lang->line('surname')?></label>
				<div class="controls">
				  <input type="text" value="<?php echo set_value('surname'); ?>" validate="required" name="surname" maxlength="15" placeholder="<?=$this->lang->line('surname')?>">
				</div>
			  </div>
			
			<div class="control-group">
				<label class="control-label" for="email"><?=$this->lang->line('email')?></label>
				<div class="controls">
				  <input type="text" validate="required|email" value="<?php echo set_value('email'); ?>" name="email" maxlength="30" placeholder="<?=$this->lang->line('email')?>" />
				</div>
			  </div>

			  <div class="control-group">
				<label class="control-label" for="password"><?=$this->lang->line('pass')?></label>
				<div class="controls">
				  <input type="password" validate="required" id="pass1" name="password" maxlength="15" placeholder="<?=$this->lang->line('pass')?>" />
				</div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label" for="surname"><?=$this->lang->line('sex')?></label>
				<div class="controls">
				<label class="radio">
				  <input type="radio" name="sex" value="2" checked="checked" /> 
				   <?=$this->lang->line('male')?>
				</label>
				<label class="radio">
				  <input type="radio" name="sex" value="1" />
				   <?=$this->lang->line('female')?>
				</label>				    
				</div>
			  </div>

			  <div class="control-group">
				<div class="controls">
					<button type="submit" class="btn"><?=$this->lang->line('join')?></button>
				</div>
			  </div>
		</form>
		
		</div>	
		
		<div class="span6">
			<p><b>Или войти через профили социальных сетей:</b></p>
			<p><a href="/user/auth/vk"><img src="/img/vk.png"></a> <a href="/user/auth/facebook"><img src="/img/facebook.png"></a></p>
		</div>
		
		
	</div>
<div class="hFooter"></div>
</div>

<?php echo $this->load->view('_layout/footer'); ?>

<!-- Login form -->
<div id="login-form" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Авторизация</h3>
  </div>
  <div class="modal-body">
    <h5>Вы можете войти используя стандартную форму:</h5>
	<form action="/user/login" id="login_form" method="post" >
	<div class="control-group">
			<label class="control-label" for="inputEmail">Почта</label>
			<div class="controls">
			  <input input type="text" name="email" validate="required|email" maxlength="30" id="inputEmail" placeholder="Почта" />
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputPassword">Пароль</label>
			<div class="controls">
			  <input type="password" name="password" validate="required" maxlength="15" id="inputPassword" placeholder="Пароль" />
			</div>
		  </div>
		  <div class="control-group">
			<div class="controls">				  
			  <button type="submit" class="btn">Войти</button>
			  &nbsp;<a href="/user/lostpassword/">Забыл пароль?</a>
			</div>
		  </div>
	</form>
	<h5>Или войти через социальные сети:</h5>
	<a href="/user/auth/vk"><img src="/img/vk.png" alt="Войти через Вконтакте" /></a>
	<a href="/user/auth/facebook"><img src="/img/facebook.png"  alt="Войти через Facebook" /></a>
  </div>  
</div>
<script>
$(document).ready(function() {
$('#reg_form').bt_validate();
 
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