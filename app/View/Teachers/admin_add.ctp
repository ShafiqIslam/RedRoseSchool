<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->Form->create('Teacher',array('class'=>'form-horizontal col-md-6', 'type'=>'file')); ?>
        <fieldset>
            <legend><?php echo __('Admin Add Teacher'); ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('name',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Designation</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('designation',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('address_1',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Mobile</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('mobile',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('email_1',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Subject</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('subject',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Photo</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('photo',array('label' => false,'class'=>'form-control', 'type'=>'file')); ?>
                </div>
            </div>
            <div class="form-group">
            	<label for="inputEmail3" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <button type="submit" class="btn submit-green s-c">Submit</button>
                </div>
            </div>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>