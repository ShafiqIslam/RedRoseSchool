<?php echo $this->element('menu');?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
    	<div>
    		<?php echo $this->Html->link(__('Back To Student List'), array('action' => 'list', $session, $class_name_id, $term), array( 'class' => 'btn btn-warning'));  ?>	
    	</div>

        <div class="student_info">
		    <h2>Student Info</h2>
		    <hr>
		    <div class="pull-left col-sm-4">
			    <p>Name : <strong><?php echo $student['Student']['name_en'];?></strong></p>
			    <p>Roll : <strong><?php echo $student['Student']['roll_no'];?></strong></p>
			    <p>Class : <strong><?php echo $class_name;?></strong></p>
			    <p>Session : <strong><?php echo $session;?></strong></p>
		    </div>
		    <div class="pull-right col-sm-3">
            	<?php 
            	if(!empty($student['Student']['image'])) {
            		echo "<div class=\"thumbnail-item pull-right img-responsive\">";
            		echo $this->Html->image('../files/students_images/'.$student['Student']['image'],array('width'=>'150px', 'height'=>'150px'));
            		echo "</div>";
            	}?>
	    </div>
		    <div style="clear:both"></div>
		</div>

		<br><hr><br>

        <div class="student_result">
        	<h1>Student Result</h1>
            <hr>
        	<h2>
        	Term: 
        	<?php 
            for($i=1; $i<=3; $i++) {
                if($i==$term) 
                    $btn = 'btn btn-custom btn-danger';
                else
                    $btn = 'btn btn-custom btn-info';

                echo $this->Html->link($i, array('action' => 'edit', $student['Student']['id'], $i), array( 'class' => $btn, 'style'=>'margin-right:10px;'));
            } 
            ?>
            </h2>

            <?php
                $marks = array();
                foreach ($subjects as $key => $subject) {
                    foreach ($student['Marks'] as $mark) {
                        if($mark['subject_id']==$key) {
                            $marks[$key] = array($mark['monthly'], $mark['terminal'], $mark['monthly']+$mark['terminal']);
                        } 
                    }
                    if(empty($marks[$key])) {
                        $marks[$key] = null;
                    }
                }

                #AuthComponent::_setTrace($marks);
            ?>

        	<div class="result_table">
        		<form method="post" class="form-horizontal col-md-6">
        		<fieldset>
        			<table cellpadding="0" cellspacing="0" class="table">
        				<thead>
        					<tr>
        						<th>Subject</th>
        						<th>Monthly</th>
        						<th>Terminal</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php foreach ($subjects as $key => $subject): ?>        					
        					<tr>
        						<td><?php echo $subject;?></td>
        						<td><input class="form-control" type="number" name="m_<?php echo $key;?>" value="<?php echo $marks[$key][0];?>"></td>
        						<td><input class="form-control" type="number" name="t_<?php echo $key;?>" value="<?php echo $marks[$key][1];?>"></td>
        					</tr>	
        					<?php endforeach;?>
        				</tbody>
        			</table>

        			<div class="form-group">
		            	<label for="inputEmail3" class="col-sm-6 control-label"></label>
		                <div class="col-sm-9">
		                    <button type="submit" class="btn submit-green s-c">Save</button>
		                    <?php echo $this->Html->link(__('Clear'), array('action' => 'delete', $student['Student']['id'], $term), array( 'class' => 'btn btn-danger'), __('Are you sure you want to delete result of %s?', $student['Student']['name_en']));  ?>
		                </div>
		            </div>
		        </fieldset>
        		</form>
        	</div>
        </div>
    </div>
</div>