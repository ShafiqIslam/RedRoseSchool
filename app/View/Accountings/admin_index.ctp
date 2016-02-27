<script type="text/javascript">
    $(function () {
        $("#go1").on('click', function () {
            var keyword = $.trim($('#keyword').val());
            location.href = ROOT+ 'admin/accountings/index/<?php echo $type;?>/keyword:' + keyword;
        });
        $("#go2").on('click', function () {
            var from = $.trim($('#from').val());
            var to = $.trim($('#to').val());
            location.href = ROOT+ 'admin/accountings/index/<?php echo $type;?>/from:' + from + '/to:' + to;
        });
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
                    	$type,
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
            <?php echo $debit_credit; ?>
            <?php echo $this->Html->link(__('Add New Accounting'), array('action' => 'add'), array( 'class' => 'btn btn-success', 'style' => 'margin-left:30px')); ?>
        </h2>

        <div class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-1 control-label">Keyword</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('titlex', array('id' => 'keyword', 'label' => false,'class'=>'form-control')); ?>
                </div>
                <div class="col-sm-1">
                    <?php
                    echo $this->Form->input('Go', array('id' => 'go1','class'=>'btn btn-info', 'type' => 'button', 'label' => false));
                    ?>
                </div>
            </div>
        </div>

        <div class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-1 control-label">From</label>
                <div class="col-sm-3">
                    <input type="date" id="from" class="form-control" value="<?php echo $from;?>">
                </div>
                <label for="inputEmail3" class="col-sm-1 control-label">To</label>
                <div class="col-sm-3">
                    <input type="date" id="to" class="form-control" value="<?php echo $to;?>">
                </div>
                <div class="col-sm-1">
                    <?php
                    echo $this->Form->input('Go', array('id' => 'go2','class'=>'btn btn-info', 'type' => 'button', 'label' => false));
                    ?>
                </div>
            </div>
        </div>
        
        <table cellpadding="0" cellspacing="0" class="table">
            <tr>
				<th><?php echo $this->Paginator->sort('date'); ?></th>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo $this->Paginator->sort('category_id'); ?></th>
                <th><?php echo $this->Paginator->sort('amount'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php $total = 0; ?>
            <?php foreach ($accountings as $accounting): ?>
                <tr> 
                    <td><?php echo date_format(date_create($accounting['Accounting']['date']), 'd M Y'); ?>&nbsp;</td>                   
					<td><?php echo h($accounting['Accounting']['name']); ?>&nbsp;</td>
					<td><?php echo h($accounting['Category']['name']); ?>&nbsp;</td>
					<td><?php echo h($accounting['Accounting']['amount']); ?>&nbsp;</td>
                    <td class="actions" style="white-space: nowrap;">
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $accounting['Accounting']['id']), array( 'class' => 'btn btn-info')); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $accounting['Accounting']['id']), array( 'class' => 'btn btn-info'), __('Are you sure you want to delete %s?', $accounting['Accounting']['name']));  ?>
                    </td>
                </tr>
                <?php $total += $accounting['Accounting']['amount']; ?>
            <?php endforeach; ?>
            <tr>
				<th>Total</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
                <th><?php echo $total;?></th>
                <th class="actions">&nbsp;</th>
            </tr>
        </table>
    </div>
</div>