<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->Form->create('Link',array('class'=>'form-horizontal col-md-6', 'type'=>'file')); ?>
        <fieldset>
            <legend><?php echo __('Admin Add Link'); ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Name Of the Link</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('name',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Address of the link</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('link',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Type</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('type',array('label' => false,'class'=>'form-control', 'options'=>array('Important'=>'Important','Games'=>'Games','Videos'=>'Videos'))); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Image</label>
                <div class="col-sm-9">
                	<?php 
                	if(!empty($this->form->data['Link']['image'])) {
                		echo "<div class=\"thumbnail-item\">";
                		echo $this->Html->image('../files/link_photos/'.$this->form->data['Link']['image']);
                		echo "</div>";
                	}?>
                    <?php echo $this->Form->input('image',array('label' => false,'class'=>'form-control', 'type'=>'file')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('description',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
            	<label for="inputEmail3" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <button type="submit" class="btn submit-green s-c">Submit</button>
                </div>
            </div>
            <?php
            echo $this->Form->input('active', array('value' => 1, 'type' => 'hidden'));
            ?>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>