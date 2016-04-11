<div class="container main-content">
	<div class="row">
		<div class="col-sm-12">
			<div class="wrapper gallery">
				<?php
					$galleryPage = $this->params['pass'];
					if ( $galleryPage[0] == 0 ) { ?>
						<h2><span><i class="fa fa-hand-o-right fa-lg"></i></span> <?php echo "বিদ্যালয়ের ছবি :"; ?> </h2>
					<?php } elseif ( $galleryPage[0] == 1 ) { ?>
						<h2><span><i class="fa fa-hand-o-right fa-lg"></i></span> <?php echo "পিকনিকের ছবি :"; ?> </h2>
					<?php } elseif ( $galleryPage[0] == 2 ) { ?>
						<h2><span><i class="fa fa-hand-o-right fa-lg"></i></span> <?php echo "স্পোর্টসের ছবি :"; ?> </h2>
					<?php } else{ ?>
						<h2><span><i class="fa fa-hand-o-right fa-lg"></i></span> <?php echo "ক্লাস পার্টির ছবি :"; ?> </h2>
					<?php }
				?>
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