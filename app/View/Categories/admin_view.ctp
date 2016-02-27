<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Debit Credit'); ?></dt>
		<dd>
			<?php echo h($category['Category']['debit_credit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($category['Category']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($category['Category']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($category['Category']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), array(), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accountings'), array('controller' => 'accountings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accounting'), array('controller' => 'accountings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Accountings'); ?></h3>
	<?php if (!empty($category['Accounting'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Debit Credit'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['Accounting'] as $accounting): ?>
		<tr>
			<td><?php echo $accounting['id']; ?></td>
			<td><?php echo $accounting['amount']; ?></td>
			<td><?php echo $accounting['debit_credit']; ?></td>
			<td><?php echo $accounting['name']; ?></td>
			<td><?php echo $accounting['category_id']; ?></td>
			<td><?php echo $accounting['date']; ?></td>
			<td><?php echo $accounting['created']; ?></td>
			<td><?php echo $accounting['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'accountings', 'action' => 'view', $accounting['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'accountings', 'action' => 'edit', $accounting['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'accountings', 'action' => 'delete', $accounting['id']), array(), __('Are you sure you want to delete # %s?', $accounting['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Accounting'), array('controller' => 'accountings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
