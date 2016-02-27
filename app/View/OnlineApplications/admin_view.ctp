<div class="onlineApplications view">
<h2><?php echo __('Online Application'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name Bn'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['name_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name En'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['name_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Name'); ?></dt>
		<dd>
			<?php echo $this->Html->link($onlineApplication['ClassName']['name'], array('controller' => 'class_names', 'action' => 'view', $onlineApplication['ClassName']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Father Name Bn'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['father_name_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Father Name En'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['father_name_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Father Occupation'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['father_occupation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Father Income'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['father_income']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Father Mobile'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['father_mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Father Office Mobile'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['father_office_mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mother Name Bn'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['mother_name_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mother Name En'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['mother_name_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mother Occupation'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['mother_occupation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mother Income'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['mother_income']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mother Mobile'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['mother_mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nationality'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['nationality']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Religion'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['religion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Guardian Name'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['guardian_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Guardian Address'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['guardian_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Guardian Occupation'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['guardian_occupation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Guardian Relation'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['guardian_relation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weekness'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['weekness']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Speciallity'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['speciallity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Previous School'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['previous_school']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Present Address'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['present_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Permanent Address'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['permanent_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthday'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['birthday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blood Group'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['blood_group']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['mail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Token'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['token']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($onlineApplication['OnlineApplication']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Online Application'), array('action' => 'edit', $onlineApplication['OnlineApplication']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Online Application'), array('action' => 'delete', $onlineApplication['OnlineApplication']['id']), array(), __('Are you sure you want to delete # %s?', $onlineApplication['OnlineApplication']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Online Applications'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Online Application'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Class Names'), array('controller' => 'class_names', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Class Name'), array('controller' => 'class_names', 'action' => 'add')); ?> </li>
	</ul>
</div>
