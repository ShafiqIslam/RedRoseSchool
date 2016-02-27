<div class="container main-content">
	<div class="row">
		<div class="col-sm-12">
			<div class="wrapper">
				<!-- SuperBox -->
				<div class="MyGallery">
					<?php foreach($data as $photo) { ?>
					<div class="images">
						<img class="img-thumbnail" src="<?php echo $this->webroot.'files/upload_photos/'.$photo['Photo']['image']?>" data-img="<?php echo $this->webroot.'files/upload_photos/'.$photo['Photo']['image']?>" alt="">
						<p><?php echo $photo['Photo']['caption']?></p>
					</div>
					<?php } ?>
				</div>
				<!-- SuperBox -->	
			</div>
		</div>
	</div>
</div>