<div class="marks index">
	<h2><?php echo __('Marks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('result_id'); ?></th>
			<th><?php echo $this->Paginator->sort('subject_id'); ?></th>
			<th><?php echo $this->Paginator->sort('mark'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($marks as $mark): ?>
	<tr>
		<td><?php echo h($mark['Mark']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mark['Result']['id'], array('controller' => 'results', 'action' => 'view', $mark['Result']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($mark['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $mark['Subject']['id'])); ?>
		</td>
		<td><?php echo h($mark['Mark']['mark']); ?>&nbsp;</td>
		<td><?php echo h($mark['Mark']['comment']); ?>&nbsp;</td>
		<td><?php echo h($mark['Mark']['created']); ?>&nbsp;</td>
		<td><?php echo h($mark['Mark']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mark['Mark']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mark['Mark']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mark['Mark']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $mark['Mark']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Mark'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
