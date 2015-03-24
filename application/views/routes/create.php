<?php
$category = array(
	'name'	=> 'category',
	'id'	=> 'category',
	'value' => set_value('category'),	
);
$from = array(
	'name'	=> 'from',
	'id'	=> 'from',
	'size'	=> 30,
);
?>
<div class="row-fluid">

<div class="span12">

	<?php echo form_open($this->uri->uri_string(), ['class' => 'form-horizontal']); ?>

	<div class="form-group">	
		<?php echo form_label('Вы', $category['id'], ['class' => 'control-label']); ?>
		<div class="controls">
		<?php
			$options = array(
                  '2'  => 'Водитель',
                  '1'    => 'Пассажир',
                );

			echo form_dropdown('shirts', $options);
		?>
		</div>
	</div>

	<div class="form-group">
		<?php echo form_label('Место отправки', $from['id'], ['class' => 'control-label']); ?>
		<div class="controls">
			<?php echo form_input($from); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="controls">
			<?php echo form_submit(['value' => 'Добавить', 'class' => 'btn']); ?>
		</div>
	</div>

	<?php echo form_close(); ?>

</div>

</div> 