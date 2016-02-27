<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->Form->create('Suggestion',array('class'=>'form-horizontal col-md-6', 'type'=>'file')); ?>
        <fieldset>
            <legend><?php echo __('Admin Add Suggestion'); ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Class</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('class_name_id',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Title</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('title',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">File</label>
                <div class="col-sm-9">
                    <?php 
                	if(!empty($this->form->data['Suggestion']['file'])) { ?>
                		<a href="<?php echo $this->webroot.'files/syllabi/'.$this->form->data['Suggestion']['file'];?>" target="_blank"><?php echo $this->form->data['Suggestion']['file'];?></a>
                	<?php } ?>
                    <?php echo $this->Form->input('file',array('label' => false,'class'=>'form-control', 'type'=>'file')); ?>
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