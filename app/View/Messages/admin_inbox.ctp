<script type="text/javascript">
    $(function () {
        $("#go").on('click', function () {
            var keyword = $.trim($('#keyword').val());
            location.href = ROOT+ 'admin/messages/inbox/keyword:' + keyword;
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
            <?php echo __('Inbox'); ?>
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
                <th><?php echo $this->Paginator->sort('sender_name'); ?></th>
                <th><?php echo $this->Paginator->sort('sender_phone'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($messages as $message): ?>
                <?php 
                if(!$message['Message']['status']) {
                    $tr_style = "background: rgba(169, 142, 66, 0.65);border-bottom:1px solid #000";
                    $td_style = "color: #000; font-weight: bold;";
                } else {
                    $tr_style = "";
                    $td_style = "";
                }
                ?>
                <tr style="<?php echo $tr_style;?>">
                    <td style="<?php echo $td_style;?>"><?php echo h($message['Message']['sender_name']); ?>&nbsp;</td>
                    <td style="<?php echo $td_style;?>"><?php echo h($message['Message']['sender_phone']); ?>&nbsp;</td>
                    <td style="<?php echo $td_style;?>"><?php echo date_format(date_create($message['Message']['created']), 'd M Y'); ?>&nbsp;</td>
                    <td class="actions" style="white-space: nowrap;<?php echo $td_style;?>">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $message['Message']['id']), array( 'class' => 'btn btn-info')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>