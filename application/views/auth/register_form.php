<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
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
	
		<?php if ($use_username) { ?>		
		<div class="form-group">
			<?php echo form_label('Username', $username['id'], ['class' => 'control-label']); ?>
			<div class="controls">
				<?php echo form_input($username); ?>			
			</div>		
			
			<?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
			
		</div>
		<?php } ?>
		<div class="form-group">
			<?php echo form_label('Email Address', $email['id'], ['class' => 'control-label']); ?>
			<div class="controls">
				<?php echo form_input($email); ?>
			</div>

			<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
		</div>

		<div class="form-group">
			<?php echo form_label('Password', $password['id'], ['class' => 'control-label']); ?>
			<div class="controls">
				<?php echo form_password($password); ?>
			</div>

			<?php echo form_error($password['name']); ?>
		</div>

		<div class="form-group">
			<?php echo form_label('Confirm Password', $confirm_password['id'], ['class' => 'control-label']); ?>
			<div class="controls">
				<?php echo form_password($confirm_password); ?>
			</div>

			<?php echo form_error($confirm_password['name']); ?>
		</div>

		<?php if ($captcha_registration) {
			if (!$use_recaptcha) { ?>		

		<div class="form-group">
			<?php echo form_label('Enter the code exactly as it appears', null, ['class' => 'control-label']); ?>
			
			<div class="controls">
				<?php echo $captcha_html; ?>
			</div>					
		</div>

		<div class="form-group">
			<?php echo form_label('Confirmation Code', $captcha['id'], ['class' => 'control-label']); ?>
			<div class="controls">
				<?php echo form_input($captcha); ?>
			</div>

			<?php echo form_error($captcha['name']); ?>
		</div>
	
		<?php }
		} ?>	
		<div class="form-group">
			<div class="controls">
	<?php echo form_submit(['value' => 'Регистрация', 'class' => 'btn']); ?>
	</div>
	</div>
	<?php echo form_close(); ?>

</div>

</div>

