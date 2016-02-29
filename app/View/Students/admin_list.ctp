<script type="text/javascript">
    $(function () {
        $("#go").on('click', function () {
            var keyword = $.trim($('#keyword').val());
            location.href = ROOT+ 'admin/students/list/<?php echo $session;?>/<?php echo $class_name_id;?>/keyword:' + keyword;
        })
    });
</script>

<?php echo $this->element('menu');?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <div class="paging pull-right">
            <ul class="pagination pull-right">
                <?php
                $this->Paginator->options(array(
                    'url' => array(
                        $class_name_id,
                        'keyword' => $keyword
                    )
                ));
                echo $this->Paginator->prev(' < ', array('tag' => 'li', 'disabledTag' => 'li', 'escape' => false), '<a href="#"> < </a>', array('class' => 'prev disabled', 'tag' => 'li', 'disabledTag' => 'li', 'escape' => false));
                echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a'));
                echo $this->Paginator->next(' > ', array('tag' => 'li', 'disabledTag' => 'li', 'escape' => false), '<a href="#"> > </a>', array('class' => 'next disabled', 'tag' => 'li', 'disabledTag' => 'li', 'escape' => false));
                ?>
            </ul>
            <p class="text-right">
                <?php
                echo $this->Paginator->counter(array(
                    'format' => __('Showing {:start} to {:end} of {:count} entries')
                ));
                ?>
            </p>
        </div>

        <h2>
            <?php echo __('Students'); echo " of class: " . $class_name; ?>
            <?php echo $this->Html->link(__('Add New Student'), array('action' => 'add'), array( 'class' => 'btn btn-success', 'style' => 'margin-left:30px')); ?>
            <?php echo $this->Html->link(__('Send Message To All Students'), array('controller'=>'messages', 'action' => 'send_sms_to_all_students', $session, $class_name_id), array( 'class' => 'btn btn-success pull-right')); ?>
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
                <th><?php echo $this->Paginator->sort('roll_no'); ?></th>
				<th><?php echo $this->Paginator->sort('name_en'); ?></th>
				<th><?php echo $this->Paginator->sort('mobile'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo h($student['Student']['roll_no']); ?>&nbsp;</td>
                    <td><?php echo h($student['Student']['name_en']); ?>&nbsp;</td>
                    <td><?php echo h($student['Student']['mobile']); ?>&nbsp;</td>
                    <td class="actions" style="white-space: nowrap;">
                        <a class="btn btn-info" href="<?php echo $this->webroot?>admin/messages/send_sms_to_student/<?php echo $student['Student']['id']?>">
                            <span><i class="fa fa-envelope-o"></i></span>
                        </a>
                        <?php echo $this->Html->link(__('Result'), array('controller'=>'results', 'action' => 'edit', $student['Student']['id']), array( 'class' => 'btn btn-info')); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $student['Student']['id']), array( 'class' => 'btn btn-info')); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $student['Student']['id']), array( 'class' => 'btn btn-info'), __('Deleting a student will also delete associated all data. Are you sure you want to delete %s?', $student['Student']['name_en']));  ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>