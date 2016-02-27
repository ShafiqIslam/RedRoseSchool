<div class="sliderImages view">
<h2><?php echo __('Slider Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sliderImage['SliderImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Link'); ?></dt>
		<dd>
			<?php echo h($sliderImage['SliderImage']['image_link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Caption'); ?></dt>
		<dd>
			<?php echo h($sliderImage['SliderImage']['caption']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($sliderImage['SliderImage']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($sliderImage['SliderImage']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($sliderImage['SliderImage']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($sliderImage['SliderImage']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Slider Image'), array('action' => 'edit', $sliderImage['SliderImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Slider Image'), array('action' => 'delete', $sliderImage['SliderImage']['id']), array(), __('Are you sure you want to delete # %s?', $sliderImage['SliderImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Slider Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Slider Image'), array('action' => 'add')); ?> </li>
	</ul>
</div>
