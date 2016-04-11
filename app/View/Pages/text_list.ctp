<div class="container main-content academic">
	<h1>পাঠ্যতালিকা</h1>
	<hr>
	<div class="row">
		<div class="col-sm-3 direction">
			<h3><span><i class="fa fa-hand-o-right fa-lg"></i></span>শ্রেণী নির্বাচন করুন</h3>	
		</div>
		<div class="col-sm-9 routine_menu">
			<ul class="nav nav-pills" role="tablist">
			<?php foreach ($classNames as $key => $className) { ?>
				<li role="presentation" class="<?php if($key==0) echo 'active';?>">
					<a href="#<?php echo $className['ClassName']['name'];?>" aria-controls="<?php echo $className['ClassName']['name'];?>" role="tab" data-toggle="tab">
						<?php echo $className['ClassName']['name'];?>
					</a>
				</li>
			<?php } ?>
		</ul>
		</div>
	</div>

	<div class="routin_hr"><hr></div>

	<div class="row">
		<div class="tab-content class_routine">
		<?php foreach ($classNames as $key => $className) { ?>
		    <div role="tabpanel" class="tab-pane fade in <?php if($key==0) echo 'active';?>" id="<?php echo $className['ClassName']['name'];?>">
				<table class="table table-bordered routin_table">
					<h2>পাঠ্যতালিকা</h2>
					<h3>শ্রেণী : <?php echo $className['ClassName']['name'];?></h3>
					<?php $class_id = $className['ClassName']['id'];?>
			      <tr>
			      </tr>
			    	
			    <?php foreach ($week_days_en as $k => $day) { ?>
			      <tr>
			        <td><?php echo $week_days_bn[$k];?></td>
			        <?php for($p=1; $p<=5; $p++) { ?>

			        <td><?php echo !empty($routine[$class_id][$day][$p]['subject']) ? $routine[$class_id][$day][$p]['subject'] : "&nbsp;";?></td>
			        <?php } ?>
			      </tr>
			    <?php } ?>
			    </table>
		    </div>
		<?php } ?>
		</div>
	</div>
</div>