<?php
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
?>


<div class="row-fluid">

	<div class="span3">
	</div>

	<div class="span9">
		<?php echo form_open($this->uri->uri_string(), ['class' => 'form-horizontal']); ?>
		<div class="form-group">
			<?php echo form_label('Email Address', $email['id'], ['class' => 'control-label']); ?>
			<div class="controls">
			<?php echo form_input($email); ?>
			</div>

			<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
		</div>
		<div class="form-group">
			<div class="controls">
			<?php echo form_submit(['value' => 'Send', 'class' => 'btn']); ?>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>

</div>