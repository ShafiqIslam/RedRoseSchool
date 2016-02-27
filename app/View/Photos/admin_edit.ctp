<?php echo $this->element('menu');?>
<?php $types = array('School', 'Picnic', 'Sports', 'Party'); ?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->Form->create('Photo',array('class'=>'form-horizontal col-md-6', 'type'=>'file')); ?>
        <fieldset>
            <legend><?php echo __('Admin Add Photo'); ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Image</label>
                <div class="col-sm-9">
                	<?php 
                	if(!empty($this->form->data['Photo']['image'])) {
                		echo "<div class=\"thumbnail-item\">";
                		echo $this->Html->image('../files/upload_photos/'.$this->form->data['Photo']['image']);
                		echo "</div>";
                	}?>
                    <?php echo $this->Form->input('image',array('label' => false,'class'=>'form-control', 'type'=>'file')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Caption</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('caption',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('description',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Category</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('type',array('label' => false,'class'=>'form-control', 'options'=>$types, 'default'=>$this->form->data['Photo']['type'])); ?>
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

        <?php if($is_slider) { ?>
            <a disabled="true" class="btn btn-info">This image is in the slider.</a>
        <?php } else { ?>
        <?php echo $this->Form->postLink(__('Add This Image To Slider'), array('action' => 'add_to_slider', $this->form->data['Photo']['id']), array('class' => 'btn btn-info'), __('Are you sure you want to add %s to slider', $this->form->data['Photo']['caption']));  ?>
        <?php } ?>
    </div>
</div>