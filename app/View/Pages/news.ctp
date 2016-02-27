<div class="container main-content">
	<div class="row">
		<div class="col-sm-9">
			<div class="tab-content">
				<?php foreach ($data as $key => $item) { ?>
				<div id="notice_<?php echo $item['News']['id'];?>" 
					class="tab-pane fade in <?php if($item['News']['id']==$id) echo 'active';?> text-content">
					<h3><?php echo date_format(date_create($item['News']['created']), 'd M Y');?></h3>
					<h1><?php echo $item['News']['title'];?></h1>
					<hr>
					<?php if(!empty($item['News']['featured_img'])) { ?>
					<img class="img-responsive" src="<?php echo $this->webroot.'files/feature_photos/'.$item['News']['featured_img'];?>">
					<?php } ?>
					<p><?php echo $item['News']['news'];?></p>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="latest_sidebar">
				<div class="side-bar side-menu side_latestnews">
					<h3>প্রয়োজনীয় লিংক সমূহ</h3>
					<hr>
					<ul id="side_link_about">
						<?php foreach ($data as $key => $item) { ?>
						<li <?php if($item['News']['id']==$id) echo "class=\"active\"";?>>
							<a data-toggle="tab" href="#notice_<?php echo $item['News']['id'];?>">
								<span><i class="glyphicon glyphicon-menu-right"></i></span>
								<?php echo $item['News']['title'];?>
							</a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>