<?php echo $this->element('menu');?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <div class="class-name">
		    <?php foreach ($classNames as $key => $className) { ?>
		        <?php
		            if($class_name_id == $className['ClassName']['id']) 
		                $btn = 'btn btn-custom btn-danger';
		            else
		                $btn = 'btn btn-custom btn-info';
		        ?>
		        <?php echo $this->Html->link($className['ClassName']['name'], array('action' => 'list', $session, $className['ClassName']['id']), array( 'class' => $btn)); ?>
		    <?php } ?>
		</div>
        <div class="class-h2"><h2><i class="fa fa-hand-o-right fa-3x"></i>Please select a class</h2></div>
    </div>
</div>
