<script type="text/javascript">
    $(function () {
        $("#go").on('click', function () {
            var keyword = $.trim($('#keyword').val());
            location.href = ROOT+ 'admin/notices/index/keyword:' + keyword;
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
            <?php echo __('Notices'); ?>
            <?php echo $this->Html->link(__('Add New Notice'), array('action' => 'add'), array( 'class' => 'btn btn-success', 'style' => 'margin-left:30px')); ?>
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
                <th><?php echo $this->Paginator->sort('title'); ?></th>
				<th><?php echo $this->Paginator->sort('notice'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($notices as $notice): ?>
                <tr>
                	<td><?php echo h($notice['Notice']['title']); ?>&nbsp;</td>
					<td><?php echo h($notice['Notice']['notice']); ?>&nbsp;</td>
                    <td><?php echo date_format(date_create($notice['Notice']['created']), 'd M Y'); ?>&nbsp;</td>
                    <td class="actions" style="white-space: nowrap;">
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $notice['Notice']['id']), array( 'class' => 'btn btn-info')); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $notice['Notice']['id']), array( 'class' => 'btn btn-info'), __('Are you sure you want to delete %s?', $notice['Notice']['title']));  ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>