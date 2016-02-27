<?php echo $this->element('menu');?>

<div class="index col-md-10 col-sm-10">
    <div class="white">        
        <?php echo $this->element('class_names');?>

        <h2>
            <?php echo __('Routine'); echo " of class - " . $class_name; ?>
        </h2>

        <div class="week_btns">
        <?php foreach ($week_days as $day): ?>
            <button id="<?php echo $day;?>_btn" class="btn <?php if($day==$show_day) echo 'btn-danger'; else echo 'btn-warning';?>"><?php echo $day;?></button>
        <?php endforeach; ?>
        </div>

        <?php foreach ($daily_routine as $key => $routines): ?>
        <div id="routine_<?php echo $key;?>" style="<?php if($key!=$show_day) echo 'display: none;'?>">
            <table cellpadding="0" cellspacing="0" class="table">
                <tr>
                	<th><?php echo 'Period'; ?></th>
    				<th><?php echo 'Subject'; ?></th>
    				<th><?php echo 'Teacher'; ?></th>
    				<th><?php echo 'Status'; ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php foreach ($routines as $routine): ?>
                    <tr>
                    <?php if($routine['Routine']['id']==$id) { ?>
                		<?php echo $this->Form->create('Routine'); ?>
                		<td>
                			<?php echo $this->Form->input('period',array('label' => false,'class'=>'form-control', 'value'=>$routine['Routine']['period'])); ?>
                			&nbsp;
                		</td>
	                    <td>
	                    	<?php echo $this->Form->input('subject_id',array('label' => false,'class'=>'form-control', 'default'=>$routine['Routine']['subject_id'])); ?>
	                    	&nbsp;
	                    </td>
	                    <td>
                			<?php echo $this->Form->input('teacher_id',array('label' => false,'class'=>'form-control', 'default'=>$routine['Routine']['teacher_id'])); ?>
                			&nbsp;
                		</td>
	                    <td>
	                    	<?php echo $this->Form->input('status',array('label' => false,'class'=>'form-control', 'default'=>$routine['Routine']['status'])); ?>
	                    	&nbsp;
	                    </td>
	                    <td class="actions" style="white-space: nowrap;">
	                        <button type="submit" class="btn submit-green s-c">Save</button>
	                        <?php echo $this->Html->link(__('Cancel'), array('action' => 'list', $class_name_id, $key), array( 'class' => 'btn btn-danger')); ?>
	                    </td>
	                    <?php echo $this->Form->end(); ?>
                	<?php } else { ?>
	                    <td><?php echo h($routine['Routine']['period']); ?>&nbsp;</td>
                        <td><?php echo h($routine['Subject']['name']); ?>&nbsp;</td>
    					<td><?php echo h($routine['Teacher']['name']); ?>&nbsp;</td>
    					<td><?php echo h($statuses[$routine['Routine']['status']]);?>&nbsp;</td>
                        <td class="actions" style="white-space: nowrap;">
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $class_name_id, $key, $routine['Routine']['id']), array( 'class' => 'btn btn-info')); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $class_name_id, $routine['Routine']['id'], $key), array( 'class' => 'btn btn-info'), __('Are you sure?'));  ?>
                        </td>
	                <?php } ?>
                    </tr>
                <?php endforeach; ?>
            </table>

            <h2>
                <?php echo $this->Html->link(__('Add New Subject'), array('action' => 'add', $class_name_id), array( 'class' => 'btn btn-success', 'style' => 'margin-left:30px')); ?>
            </h2>
        </div>
        <?php endforeach; ?>
    </div>
</div>