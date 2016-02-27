<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->Form->create('User',array('class'=>'form-horizontal col-md-6')); ?>
        <fieldset>
            <legend><?php echo __('Admin Add CMS User'); ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">User Name</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('username',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('email',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('simple_pwd',array('label' => false,'class'=>'form-control', 'type'=>'password')); ?>
                </div>
            </div>
            <div class="form-group">
            	<label for="inputEmail3" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <button type="submit" class="btn submit-green s-c">Submit</button>
                </div>
            </div>
            <?php
            echo $this->Form->input('role', array('value' => 'admin', 'type' => 'hidden'));
            ?>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
