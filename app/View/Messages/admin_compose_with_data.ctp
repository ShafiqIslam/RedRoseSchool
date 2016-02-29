<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <form class="form-horizontal col-md-6" action="<?php echo $this->webroot;?>admin/messages/compose" method="post">
        <fieldset>
            <legend><?php echo __('Admin Compose Message'); ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Subject</label>
                <div class="col-sm-9">
                    <input name="data[Message][subject]" label="false" class="form-control"
                    value="<?php echo $subject;?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Receiver Name</label>
                <div class="col-sm-9">
                    <input name="data[Message][receiver_name]" label="false" class="form-control"
                    value="<?php echo $receiver_name;?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Receiver Phone(s)</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="data[Message][numbers]" placeholder="You can use multiple numbers separeted by comma(,) e.g: 01712345678,01911223344" required><?php echo $receiver;?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="data[Message][text]" placeholder="Message must not cross letter limit 150" required><?php echo $message;?></textarea>
                </div>
            </div>
            <div class="form-group">
            	<label for="inputEmail3" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-warning" ><span class="send">Send</span> <span class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>
            <?php echo $this->Form->input('return_to',array('type' => 'hidden', 'value' => $return_to)); ?>
            <?php echo $this->Form->input('flash_msg',array('type' => 'hidden', 'value' => $flash_msg)); ?>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
