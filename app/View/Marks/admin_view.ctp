<div class="marks view">
<h2><?php echo __('Mark'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mark['Mark']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Result'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mark['Result']['id'], array('controller' => 'results', 'action' => 'view', $mark['Result']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mark['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $mark['Subject']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mark'); ?></dt>
		<dd>
			<?php echo h($mark['Mark']['mark']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($mark['Mark']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($mark['Mark']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($mark['Mark']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mark'), array('action' => 'edit', $mark['Mark']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mark'), array('action' => 'delete', $mark['Mark']['id']), array(), __('Are you sure you want to delete # %s?', $mark['Mark']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Marks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mark'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
