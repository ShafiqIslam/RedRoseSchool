<div class="marks form">
<?php echo $this->Form->create('Mark'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Mark'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('result_id');
		echo $this->Form->input('subject_id');
		echo $this->Form->input('mark');
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Mark.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Mark.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Marks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
