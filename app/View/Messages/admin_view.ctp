<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <h2>
            <?php echo __('View'); ?>
            <?php echo $this->Html->link(__('Back To Message List'), array('action' => $message['Message']['in_out'] ? "inbox" : "sent"), array( 'class' => 'btn btn-success pull-right')); ?>
        </h2>
        <br><br>

        <table cellpadding="0" cellspacing="0" class="table table-bordered table-stripped">
            <tr>
                <th>Subject</th>
                <td><?php echo $message['Message']['subject']?></td>
            </tr>
            <?php if(!$message['Message']['in_out']) { ?>
            <tr>
                <th>Receiver Name</th>
                <td><?php echo $message['Message']['receiver_name']?></td>
            </tr>
            <tr>
                <th>Receiver Phone</th>
                <td><?php echo $message['Message']['receiver_phone']?></td>
            </tr>
            <?php } else { ?>
            <tr>
                <th>Sender Name</th>
                <td><?php echo $message['Message']['sender_name']?></td>
            </tr>
            <tr>
                <th>Sender Mail</th>
                <td><?php echo $message['Message']['sender_mail']?></td>
            </tr>
            <tr>
                <th>Sender Phone</th>
                <td><?php echo $message['Message']['sender_phone']?></td>
            </tr>
            <?php } ?>
            <tr>
                <th>Message</th>
                <td><?php echo $message['Message']['text']?></td>
            </tr>
            <tr>
                <th>Date</th>
                <td><?php echo date_format(date_create($message['Message']['created']), 'd M Y');?></td>
            </tr>
        </table>
        <?php if(!$message['Message']['in_out'] && !$message['Message']['status']) { ?>
            <?php echo $this->Html->link(__('Resend'), array('action' => 'resend', $message['Message']['id']), array( 'class' => 'btn btn-danger')); ?>
        <?php } ?>
    </div>
</div>
