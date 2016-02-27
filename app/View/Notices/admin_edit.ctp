<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->Form->create('Notice',array('class'=>'form-horizontal col-md-6', 'type'=>'file')); ?>
        <fieldset>
            <legend><?php echo __('Admin Add Notice'); ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Title</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('title',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Notice</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('notice',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Image</label>
                <div class="col-sm-9">
                	<?php 
                	if(!empty($this->form->data['Notice']['featured_img'])) {
                		echo "<div class=\"thumbnail-item\">";
                		echo $this->Html->image('../files/feature_photos/'.$this->form->data['Notice']['featured_img']);
                		echo "</div>";
                	}?>
                    <?php echo $this->Form->input('featured_img',array('label' => false,'class'=>'form-control', 'type'=>'file')); ?>
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