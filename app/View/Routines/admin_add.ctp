<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->Form->create('Routine',array('class'=>'form-horizontal col-md-6')); ?>
        <fieldset>
            <legend><?php echo __('Admin Add Routine'); echo " to class - " . $class_name; ?></legend>
            
            <?php echo $this->Form->input('class_name_id',array('label' => false,'class'=>'form-control', 'type'=>'hidden', 'value'=>$class_name_id)); ?>
            <?php echo $this->Form->input('status',array('label' => false,'class'=>'form-control', 'type'=>'hidden', 'value'=>0)); ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Day</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('weekday',array('label' => false,'class'=>'form-control', 'options'=>$week_days)); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Period</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('period',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Subject</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('subject_id',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Teacher</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('teacher_id',array('label' => false,'class'=>'form-control')); ?>
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