<?php echo $this->element('menu');?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <h2>
            <?php echo __('Classes');?>
            <?php echo $this->Html->link(__('Add New Class'), array('action' => 'add'), array( 'class' => 'btn btn-success', 'style' => 'margin-left:30px')); ?>
        </h2>
        
        <table cellpadding="0" cellspacing="0" class="table">
            <tr>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('Class Teacher'); ?></th>
                <th><?php echo $this->Paginator->sort('Book list'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($classNames as $className): ?>
                <tr>
                    <td><?php echo h($className['ClassName']['name']); ?>&nbsp;</td>                    
                    <td>
                        <?php 
                        if(!empty($className['ClassName']['teacher_id'])) 
                            echo h($className['Teacher']['name']); 
                        else 
                            echo "Class Teacher Not Set."; 
                        ?>
                        &nbsp;
                    </td>
                    <td><?php if(!empty($className['ClassName']['book_list'])) { ?><a href="<?php echo $this->webroot.'files/book_lists/'.$className['ClassName']['book_list'];?>" target="_blank"><?php echo $className['ClassName']['book_list'];?></a><?php } ?>&nbsp;</td>
                    <td class="actions" style="white-space: nowrap;">
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $className['ClassName']['id']), array( 'class' => 'btn btn-info')); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $className['ClassName']['id']), array( 'class' => 'btn btn-info'), __('Are you sure you want to delete %s?', $className['ClassName']['name']));  ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>