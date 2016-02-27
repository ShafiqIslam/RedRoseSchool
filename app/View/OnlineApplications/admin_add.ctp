<div class="onlineApplications form">
<?php echo $this->Form->create('OnlineApplication'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Online Application'); ?></legend>
	<?php
		echo $this->Form->input('name_bn');
		echo $this->Form->input('name_en');
		echo $this->Form->input('image');
		echo $this->Form->input('class_name_id');
		echo $this->Form->input('father_name_bn');
		echo $this->Form->input('father_name_en');
		echo $this->Form->input('father_occupation');
		echo $this->Form->input('father_income');
		echo $this->Form->input('father_mobile');
		echo $this->Form->input('father_office_mobile');
		echo $this->Form->input('mother_name_bn');
		echo $this->Form->input('mother_name_en');
		echo $this->Form->input('mother_occupation');
		echo $this->Form->input('mother_income');
		echo $this->Form->input('mother_mobile');
		echo $this->Form->input('nationality');
		echo $this->Form->input('religion');
		echo $this->Form->input('guardian_name');
		echo $this->Form->input('guardian_address');
		echo $this->Form->input('guardian_occupation');
		echo $this->Form->input('guardian_relation');
		echo $this->Form->input('weekness');
		echo $this->Form->input('speciallity');
		echo $this->Form->input('previous_school');
		echo $this->Form->input('present_address');
		echo $this->Form->input('permanent_address');
		echo $this->Form->input('birthday');
		echo $this->Form->input('blood_group');
		echo $this->Form->input('mobile');
		echo $this->Form->input('mail');
		echo $this->Form->input('status');
		echo $this->Form->input('token');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Online Applications'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Class Names'), array('controller' => 'class_names', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Class Name'), array('controller' => 'class_names', 'action' => 'add')); ?> </li>
	</ul>
</div>
