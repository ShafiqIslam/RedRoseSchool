<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->Form->create('General',array('class'=>'form-horizontal col-md-6', 'type'=>'file')); ?>
        <fieldset>
            <legend><?php echo __('General Settings'); ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Address Line 1</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('address_1',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Address Line 1</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('address_2',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
                <div class="col-sm-9 inputGroupContainer">
                	<div class="input-group">
	                	<span class="input-group-addon">+880</span>
	                    <?php echo $this->Form->input('phone',array('label' => false,'class'=>'form-control')); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('mail',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Online Admission Process</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('online_admission_on',array('label' => false,'class'=>'form-control','options'=>array('Closed','Ongoing'))); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Online Admission Message</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('admission_msg',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Chairman</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('chairman',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Headmaster</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('headmaster',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">About</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('about',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Purpose</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('purpose',array('label' => false,'class'=>'form-control')); ?>
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


<!-- Text editor -->
<style type="text/css">
	.nicEdit-selected {
	    border: none !important;
	    overflow: auto !important;
	    outline: none !important;

	    -webkit-box-shadow: none !important;
	    -moz-box-shadow: none !important;
	    box-shadow: none !important;
	}
</style>
<script type="text/javascript">
    var i_path = "<?php echo $this->webroot;?>img/nicEditorIcons.gif";
</script>
<?php echo $this->Html->script(array('nicEdit')); ?>
<script type="text/javascript">
//<![CDATA[
    bkLib.onDomLoaded(function() { 
      nicEditors.allTextAreas(); 
      $('div.text_area>div').each(function(){$(this).width("100%");});
      $('div.text_area').removeAttr('style');
    });
//]]>
</script>