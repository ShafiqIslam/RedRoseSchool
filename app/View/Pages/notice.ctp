<div class="container main-content">
	<div class="row">
		<div class="col-sm-9">
			<div class="tab-content">
				<?php foreach ($data as $key => $item) { ?>
				<div id="notice_<?php echo $item['Notice']['id'];?>" 
					class="tab-pane fade in <?php if($item['Notice']['id']==$id) echo 'active';?> text-content">
					<h3><?php echo date_format(date_create($item['Notice']['created']), 'd M Y');?></h3>
					<h1><?php echo $item['Notice']['title'];?></h1>
					<hr>
					<p><?php echo $item['Notice']['notice'];?></p>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="side-link">
				<div class="side-bar side-menu">
					<h3>সর্বশেষ বিজ্ঞপ্তি</h3>
					<hr>
					<ul>
						<?php foreach ($data as $key => $item) { ?>
						<li <?php if($item['Notice']['id']==$id) echo "class=\"active\"";?>>
							<a data-toggle="tab" href="#notice_<?php echo $item['Notice']['id'];?>">
								<span><i class="glyphicon glyphicon-menu-right"></i></span>
								<?php echo $item['Notice']['title'];?>
							</a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>