<?php echo $this->element('menu');?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->element('class_names');?>

        <h2>
            <?php echo __('Subjects'); echo " of class - " . $class_name; ?>
            <?php echo $this->Html->link(__('Add New Subject'), array('action' => 'add', $class_name_id), array( 'class' => 'btn btn-success', 'style' => 'margin-left:30px')); ?>
        </h2>

        <table cellpadding="0" cellspacing="0" class="table">
            <tr>
                <th><?php echo 'Name';?></th>
                <th><?php echo 'Order';?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($subjects as $subject): ?>
                <tr>
                	<?php if($subject['Subject']['id']==$edit_id) { ?>
                		<?php echo $this->Form->create('Subject'); ?>
                		<td>
                			<?php echo $this->Form->input('name',array('label' => false,'class'=>'form-control', 'value'=>$subject['Subject']['name'])); ?>
                			&nbsp;
                		</td>
	                    <td>
	                    	<?php echo $this->Form->input('order',array('label' => false,'class'=>'form-control', 'value'=>$subject['Subject']['order'])); ?>
	                    	&nbsp;
	                    </td>
	                    <td class="actions" style="white-space: nowrap;">
	                        <button type="submit" class="btn submit-green s-c">Save</button>
	                        <?php echo $this->Html->link(__('Cancel'), array('action' => 'list', $class_name_id), array( 'class' => 'btn btn-danger')); ?>
	                    </td>
	                    <?php echo $this->Form->end(); ?>
                	<?php } else { ?>
	                    <td><?php echo h($subject['Subject']['name']); ?>&nbsp;</td>
	                    <td><?php echo h($subject['Subject']['order']); ?>&nbsp;</td>
	                    <td class="actions" style="white-space: nowrap;">
	                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $class_name_id, $subject['Subject']['id']), array( 'class' => 'btn btn-info')); ?>
	                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $class_name_id, $subject['Subject']['id']), array( 'class' => 'btn btn-info'), __('Are you sure you want to delete %s?', $subject['Subject']['name']));  ?>
	                    </td>
	                <?php } ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>