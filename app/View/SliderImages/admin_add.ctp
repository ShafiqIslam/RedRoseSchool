<div class="sliderImages form">
<?php echo $this->Form->create('SliderImage'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Slider Image'); ?></legend>
	<?php
		echo $this->Form->input('image_link');
		echo $this->Form->input('caption');
		echo $this->Form->input('active');
		echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Slider Images'), array('action' => 'index')); ?></li>
	</ul>
</div>
