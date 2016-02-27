<div class="students view">
<h2><?php echo __('Student'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($student['Student']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name Bn'); ?></dt>
		<dd>
			<?php echo h($student['Student']['name_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name En'); ?></dt>
		<dd>
			<?php echo h($student['Student']['name_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($student['Student']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Roll No'); ?></dt>
		<dd>
			<?php echo h($student['Student']['roll_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Name'); ?></dt>
		<dd>
			<?php echo $this->Html->link($student['ClassName']['name'], array('controller' => 'class_names', 'action' => 'view', $student['ClassName']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Father Name Bn'); ?></dt>
		<dd>
			<?php echo h($student['Student']['father_name_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Father Name En'); ?></dt>
		<dd>
			<?php echo h($student['Student']['father_name_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Father Occupation'); ?></dt>
		<dd>
			<?php echo h($student['Student']['father_occupation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Father Income'); ?></dt>
		<dd>
			<?php echo h($student['Student']['father_income']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Father Mobile'); ?></dt>
		<dd>
			<?php echo h($student['Student']['father_mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Father Office Mobile'); ?></dt>
		<dd>
			<?php echo h($student['Student']['father_office_mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mother Name Bn'); ?></dt>
		<dd>
			<?php echo h($student['Student']['mother_name_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mother Name En'); ?></dt>
		<dd>
			<?php echo h($student['Student']['mother_name_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mother Occupation'); ?></dt>
		<dd>
			<?php echo h($student['Student']['mother_occupation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mother Income'); ?></dt>
		<dd>
			<?php echo h($student['Student']['mother_income']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mother Mobile'); ?></dt>
		<dd>
			<?php echo h($student['Student']['mother_mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nationality'); ?></dt>
		<dd>
			<?php echo h($student['Student']['nationality']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Religion'); ?></dt>
		<dd>
			<?php echo h($student['Student']['religion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Guardian Name'); ?></dt>
		<dd>
			<?php echo h($student['Student']['guardian_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Guardian Address'); ?></dt>
		<dd>
			<?php echo h($student['Student']['guardian_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Guardian Occupation'); ?></dt>
		<dd>
			<?php echo h($student['Student']['guardian_occupation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Guardian Relation'); ?></dt>
		<dd>
			<?php echo h($student['Student']['guardian_relation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weekness'); ?></dt>
		<dd>
			<?php echo h($student['Student']['weekness']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Speciallity'); ?></dt>
		<dd>
			<?php echo h($student['Student']['speciallity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Previous School'); ?></dt>
		<dd>
			<?php echo h($student['Student']['previous_school']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Present Address'); ?></dt>
		<dd>
			<?php echo h($student['Student']['present_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Permanent Address'); ?></dt>
		<dd>
			<?php echo h($student['Student']['permanent_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthday'); ?></dt>
		<dd>
			<?php echo h($student['Student']['birthday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blood Group'); ?></dt>
		<dd>
			<?php echo h($student['Student']['blood_group']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($student['Student']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail'); ?></dt>
		<dd>
			<?php echo h($student['Student']['mail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Session'); ?></dt>
		<dd>
			<?php echo h($student['Student']['session']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($student['Student']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($student['Student']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Simple Pwd'); ?></dt>
		<dd>
			<?php echo h($student['Student']['simple_pwd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($student['Student']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($student['Student']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Student'), array('action' => 'edit', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Student'), array('action' => 'delete', $student['Student']['id']), array(), __('Are you sure you want to delete # %s?', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Class Names'), array('controller' => 'class_names', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Class Name'), array('controller' => 'class_names', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Results'); ?></h3>
	<?php if (!empty($student['Result'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Term'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($student['Result'] as $result): ?>
		<tr>
			<td><?php echo $result['id']; ?></td>
			<td><?php echo $result['student_id']; ?></td>
			<td><?php echo $result['term']; ?></td>
			<td><?php echo $result['comment']; ?></td>
			<td><?php echo $result['created']; ?></td>
			<td><?php echo $result['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'results', 'action' => 'view', $result['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'results', 'action' => 'edit', $result['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'results', 'action' => 'delete', $result['id']), array(), __('Are you sure you want to delete # %s?', $result['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
