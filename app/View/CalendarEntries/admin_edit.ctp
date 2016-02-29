<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->Form->create('CalendarEntry',array('class'=>'form-horizontal col-md-6')); ?>
        <fieldset>
            <legend><?php echo __('Admin Add CalendarEntry'); ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Date</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('date',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Title</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('title',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Entry</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('entry',array('label' => false,'class'=>'form-control')); ?>
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