<div class="container main-content game">
	<h1>Games</h1>
	<hr>

	<ul>
		<?php foreach ($games as $key => $item) { ?>
			<li>
				<a href="<?php echo $item['Link']['link'];?>" target="_blank">
					<?php if(!empty($item['Link']['image'])) { ?>
						<p><?php } echo $item['Link']['name']; ?></p>
						<img src="<?php echo $this->webroot.'files/link_photos/'.$item['Link']['image']; ?>" height="200px" width="200px">
				</a>
			</li><br><br>
		<?php } ?>
	</ul>
</div>