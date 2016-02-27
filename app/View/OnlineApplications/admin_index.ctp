<script type="text/javascript">
    $(function () {
        $("#go").on('click', function () {
            var keyword = $.trim($('#keyword').val());
            location.href = ROOT+ 'admin/onlineApplications/index/keyword:' + keyword;
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
            <?php echo __('Online Application');?>
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
                <th>Class</th>
				<th><?php echo $this->Paginator->sort('name_en'); ?></th>
				<th><?php echo $this->Paginator->sort('status'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($onlineApplications as $onlineApplication): ?>
                <tr>
                    <th><?php echo h($onlineApplication['ClassName']['name']); ?>&nbsp;</th>
                    <td><?php echo h($onlineApplication['OnlineApplication']['name_en']); ?>&nbsp;</td>
                    <td><?php echo h($onlineApplication['OnlineApplication']['status']); ?>&nbsp;</td>
                    <td class="actions" style="white-space: nowrap;">
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $onlineApplication['OnlineApplication']['id']), array( 'class' => 'btn btn-info')); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $onlineApplication['OnlineApplication']['id']), array( 'class' => 'btn btn-info'), __('Are you sure you want to delete %s?', $onlineApplication['OnlineApplication']['name_en']));  ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>