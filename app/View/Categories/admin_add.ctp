<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->Form->create('Category',array('class'=>'form-horizontal col-md-6')); ?>
        <fieldset>
            <legend><?php echo __('Admin Add Category'); ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Debit/Credit</label>
                <div class="col-sm-9">
                    <button type="button" id="debit_btn" class="btn btn-danger">Debit</button>
                    <button type="button" id="credit_btn" class="btn btn-warning">Credit</button>
                    <?php echo $this->Form->input('debit_credit', array('label' => false,'class'=>'form-control', 'type'=>'hidden', 'value'=>0)); ?>
                </div>
            </div>
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

        <script>
            $(document).ready(function(){
                $('#debit_btn').click(function(){
                	$('#credit_btn').removeClass('btn-warning').removeClass('btn-danger').addClass('btn-warning');
                    $(this).removeClass('btn-warning').addClass('btn-danger');
                    $('input[name="data[Category][debit_credit]"]').val(0);
                });
                $('#credit_btn').click(function(){
                	$('#debit_btn').removeClass('btn-warning').removeClass('btn-danger').addClass('btn-warning');
                    $(this).removeClass('btn-warning').addClass('btn-danger');
                    $('input[name="data[Category][debit_credit]"]').val(1);
                });
            });
        </script>
    </div>
</div>