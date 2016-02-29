<script type="text/javascript">
    $(function () {
        $("#go").on('click', function () {
            var keyword = $.trim($('#keyword').val());
            location.href = ROOT+ 'admin/results/list/<?php echo $session;?>/<?php echo $class_name_id;?>/<?php echo $term;?>/keyword:' + keyword;
        })
    });
</script>

<?php echo $this->element('menu');?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <h2>
            <?php echo __('Results'); echo " of class: " . $class_name;  echo "; Term: ";?>
            <?php 
            for($i=1; $i<=3; $i++) {
                if($i==$term) 
                    $btn = 'btn btn-custom btn-danger';
                else
                    $btn = 'btn btn-custom btn-info';

                echo $this->Html->link($i, array('action' => 'list', $session, $class_name_id, $i), array( 'class' => $btn, 'style'=>'margin-right:10px;'));
            } 
            ?>

            <?php echo $this->Html->link(__('Send Message To All Students'), array('controller'=>'messages', 'action' => 'send_result_to_students', $session, $class_name_id, $term), array( 'class' => 'btn btn-success pull-right')); ?>
        </h2>

        <div class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-1 control-label">Keyword</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('titlex', array('id' => 'keyword', 'label' => false,'class'=>'form-control')); ?>
                </div>
                <div class="col-sm-1">
                    <?php
                    echo $this->Form->input('Go', array('id' => 'go','class'=>'btn btn-info', 'type' => 'button', 'label' => false));
                    ?>
                </div>
            </div>
        </div>
        
        <table cellpadding="0" cellspacing="0" class="table">
            <tr>
                <th><?php echo "Roll"; ?></th>
				<th><?php echo 'Name'; ?></th>
                <?php foreach ($subjects as $subject): ?>
                <th><?php echo $subject; ?></th>
                <?php endforeach;?>
                <th>
				<th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($students as $student): ?>
                <?php
                    $marks = array();
                    foreach ($subjects as $key => $subject) {
                        foreach ($student['Marks'] as $mark) {
                            if($mark['subject_id']==$key) {
                                $marks[$key] = array($mark['monthly'], $mark['terminal'], $mark['monthly']+$mark['terminal']);
                            } 
                        }
                        if(empty($marks[$key])) {
                            $marks[$key] = null;
                        }
                    }
                ?>
                <tr>
                    <td><?php echo h($student['Student']['roll_no']); ?>&nbsp;</td>
                    <td><?php echo h($student['Student']['name_en']); ?>&nbsp;</td>
                    <?php foreach ($marks as $key => $mark): ?>
                    <td><?php if(!empty($mark)) echo $mark[0]."+".$mark[1]."=<b>".$mark[2]."</b>";?>&nbsp;</th>
                    <?php endforeach;?>
                    <td>
                    <td class="actions" style="white-space: nowrap;">
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $student['Student']['id'], $term), array( 'class' => 'btn btn-info')); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $student['Student']['id'], $term), array( 'class' => 'btn btn-info'), __('Are you sure you want to delete result of %s?', $student['Student']['name_en']));  ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>