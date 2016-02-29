<?php echo $this->element('menu');?>
<?php 
$current_year = date('Y');
$starting_year = 2016;
$blood_groups = array(
	'A+' => 'A+',
	'B+' => 'B+',
	'AB+' => 'AB+',
	'O+' => 'O+',
	'A-' => 'A-',
	'B-' => 'B-',
	'AB-' => 'AB-',
	'O-' => 'O-'
);
?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
    	<h2>
            <?php echo $this->Html->link(__('Go Back To List'), array('action' => 'list', $this->form->data['Student']['session'], $this->form->data['Student']['class_name_id']), array( 'class' => 'btn btn-success', 'style' => 'margin-left:30px')); ?>
            <?php echo $this->Html->link(__('Result Of this Student'), array('controller'=>'results', 'action' => 'edit', $this->form->data['Student']['id'], 1), array( 'class' => 'btn btn-success', 'style' => 'margin-left:30px')); ?>
    	</h2>
        <?php echo $this->Form->create('Student',array('class'=>'form-horizontal col-md-6', 'type'=>'file')); ?>
        <fieldset>
            <legend><?php echo __('Admin Edit Student'); ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Class</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('class_name_id',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Session</label>
                <div class="col-sm-9">
                    <select name="data[Student][session]" class="form-control">
                    	<?php for ($i=$current_year; $i<=$current_year+1; $i++) { 
                    		echo "<option value='$i'>$i</option>";
                    	} ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Roll</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('roll_no',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Name (Bangla)</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('name_bn',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Name (English)</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('name_en',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Photo</label>
                <div class="col-sm-9">
                	<?php 
                	if(!empty($this->Form->data['Student']['image'])) {
                		echo "<div class=\"thumbnail-item\">";
                		echo $this->Html->image('../files/students_images/'.$this->form->data['Student']['image']);
                		echo "</div>";
                	}?>
                    <?php echo $this->Form->input('image',array('label' => false,'class'=>'form-control', 'type'=>'file')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Father Name (Bangla)</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('father_name_bn',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Father Name (English)</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('father_name_en',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Father Occupation</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('father_occupation',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Father Income</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('father_income',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Father Mobile</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('father_mobile',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Father Office Mobile</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('father_office_mobile',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Mother Name (Bangla)</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('mother_name_bn',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Mother Name (English)</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('mother_name_en',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Mother Occupation</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('mother_occupation',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Mother Income</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('mother_income',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Mother Mobile</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('mother_mobile',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Nationality</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('nationality',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Religion</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('religion',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Guardian Name</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('guardian_name',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Guardian Address</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('guardian_address',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Guardian Occupation</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('guardian_occupation',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Relation with Guardian</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('guardian_relation',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Weekness (in any)</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('weekness',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Speciallity (in any)</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('speciallity',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Previous School</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('previous_school',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Present Address</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('present_address',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Permanent Address</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('permanent_address',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Birthday</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('birthday',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Blood Group</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('birthday',array('label' => false,'class'=>'form-control', 'options'=>$blood_groups)); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Contact Mobile</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('mobile',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Contact Mail</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('mail',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('simple_pwd',array('label' => false,'class'=>'form-control')); ?>
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
