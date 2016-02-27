<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->Form->create('Message',array('class'=>'form-horizontal col-md-6')); ?>
        <fieldset>
            <legend><?php echo __('Admin Compose Message'); ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Subject</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('subject',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Receiver Name</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('receiver_name',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Receiver Phone(s)</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="data[Message][numbers]" placeholder="You can use multiple numbers separeted by comma(,)" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="data[Message][text]" placeholder="Message must not cross letter limit 150" required></textarea>
                </div>
            </div>
            <div class="form-group">
            	<label for="inputEmail3" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-warning" ><span class="send">Send</span> <span class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
