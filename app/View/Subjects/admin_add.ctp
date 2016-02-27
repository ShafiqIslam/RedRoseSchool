<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->Form->create('Subject',array('class'=>'form-horizontal col-md-6')); ?>
        <fieldset>
            <legend><?php echo __('Admin Add Subject'); echo " to class - " . $class_name; ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('name',array('label' => false,'class'=>'form-control')); ?>
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