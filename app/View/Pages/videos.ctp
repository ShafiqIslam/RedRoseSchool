<div class="container main-content video_page">
	<h1>Videos</h1>
	<hr>
	<div class="row">
		<div class="col-sm-9">
			<div class="tab-content222 video">
				<iframe width="560" height="315" frameborder="0" allowfullscreen src="<?php echo $video['Link']['link']?>"></iframe>

				<div><p><?php echo $video['Link']['description']?></p></div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="side-link">
				<div class="side-bar side-menu">
					<h3>সকল ভিডিও</h3>
					<hr>
					<ul id="side_link_about">
					<?php foreach ($videos as $key => $item) { ?>
						<li class="<?php if($item['Link']['id'] == $id) echo 'active';?>">
							<a href="<?php echo $this->webroot.'links/videos/'.$item['Link']['id']?>">
								<span><i class="glyphicon glyphicon-menu-right"></i></span>
								<?php echo $item['Link']['name']?>
							</a>
						</li>
					<?php } ?>						
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>