<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>

<div class="row-fluid">

<div class="span3">
	<ul class="nav nav-list">
	  <li class="nav-header">List header</li>
	  <li class="active"><a href="#">Home</a></li>
	  <li><a href="#">Library</a></li>
	  ...
	</ul>

</div>

<div class="span9">


<?php echo form_open($this->uri->uri_string(), ['class' => 'form-horizontal']); ?>
<div class="form-group">
	<?php echo form_label($login_label, $login['id'], ['class' => 'control-label']); ?>
	<div class="controls">
		<?php echo form_input($login); ?>
	</div>

	<?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
</div>

<div class="form-group">
	<?php echo form_label('Password', $password['id'], ['class' => 'control-label']); ?>
	<div class="controls">
		<?php echo form_password($password); ?>
	</div>

	<?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
</div>

<div class="form-group">
	<div class="controls">
		<?php echo form_checkbox($remember); ?>
		<?php echo form_label('Remember me', $remember['id']); ?>
		<?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
		<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
	</div>
</div>

<div class="form-group">
	<div class="controls">
		<?php echo form_submit(['value' => 'Let me in', 'class' => 'btn']); ?>
	</div>
</div>

<?php echo form_close(); ?>

</div>

</div>