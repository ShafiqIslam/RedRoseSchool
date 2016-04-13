<script type="text/javascript">
    $(function () {
        $("#go").on('click', function () {
            var to = $.trim($('#send_to').val());
            var notice_id = "<?php echo $this->Form->data['Notice']['id'];?>";
            location.href = ROOT + 'admin/messages/send_notice/' + notice_id + '/to:' + to;
        });
    });
</script>

<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">

        <div class="form-horizontal">
            <legend></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Send this Notice To: </label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('send_to',array('label' => false, 'class'=>'form-control', 'id'=> 'send_to', 'options'=>array('everyone'=>'Everyone', 'students'=>'Students', 'teachers'=>'Teachers'))); ?>
                    <?php echo $this->Form->input('notice_id',array('label' => false, 'type'=>'hidden', 'id'=> 'notice_id', 'value' => $this->Form->data['Notice']['id'])); ?>
                </div>
                <div class="col-sm-1">
                    <?php
                    echo $this->Form->input('Go', array('id' => 'go','class'=>'btn btn-info', 'type' => 'button', 'label' => false));
                    ?>
                </div>
            </div>
        </div>

        <?php echo $this->Form->create('Notice',array('class'=>'form-horizontal col-md-6', 'type'=>'file')); ?>
        <fieldset>
            <legend><?php echo __('Admin Edit Notice'); ?></legend>
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
                	if(!empty($this->Form->data['Notice']['featured_img'])) {
                		echo "<div class=\"thumbnail-item\">";
                		echo $this->Html->image('../files/feature_photos/'.$this->Form->data['Notice']['featured_img']);
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