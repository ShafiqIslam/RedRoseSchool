<div class="calendarEntries view">
<h2><?php echo __('Calendar Entry'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($calendarEntry['CalendarEntry']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($calendarEntry['CalendarEntry']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($calendarEntry['CalendarEntry']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entry'); ?></dt>
		<dd>
			<?php echo h($calendarEntry['CalendarEntry']['entry']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($calendarEntry['CalendarEntry']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($calendarEntry['CalendarEntry']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calendar Entry'), array('action' => 'edit', $calendarEntry['CalendarEntry']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calendar Entry'), array('action' => 'delete', $calendarEntry['CalendarEntry']['id']), array(), __('Are you sure you want to delete # %s?', $calendarEntry['CalendarEntry']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calendar Entries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calendar Entry'), array('action' => 'add')); ?> </li>
	</ul>
</div>
