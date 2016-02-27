<?php 
echo $this->Html->css(array('magnific-popup'));
echo $this->Html->script(array('jquery-1.9.1', 'jquery.magnific-popup'));
?>

<script type="text/javascript">
    $(document).ready(function() {
		$('.image-link').magnificPopup({
			type: 'image',
			mainClass: 'mfp-with-zoom', // this class is for CSS animation below

			zoom: {
				enabled: true, // By default it's false, so don't forget to enable it
				duration: 300, // duration of the effect, in milliseconds
				easing: 'ease-in-out', // CSS transition easing function
			}
		});
	});
</script>
<?php echo $this->element('menu');?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <h2>
        	<?php echo __('Slider Images'); ?>
        	<?php echo $this->Html->link(__('Edit Order'), array('action' => 'edit'), array( 'class' => 'btn btn-success', 'style' => 'margin-left:30px')); ?>
        </h2>
        <?php foreach ($sliderImages as $key=>$sliderImage): ?>
        	<?php if($key%4==0) { ?>
	        <div class="row">
	        <?php } ?>
	        	<div class="col-md-3">
		        	<a class="image-link" href="<?php echo $this->webroot.'files/upload_photos/'.$sliderImage['Photo']['image']?>">
		        		<?php echo $this->Html->image('../files/upload_photos/'.$sliderImage['Photo']['image'],array('height'=>'150px','width'=>'250px'));?>
		        	</a>
		        	<div class="img_desc">
	                    <?php echo $this->Form->postLink(__('Remove'), array('action' => 'delete', $sliderImage['SliderImage']['id']), array('class' => 'btn btn-info'), __('Are you sure you want to remove %s?', $sliderImage['Photo']['caption']));  ?>
		        	</div>	        	
		        </div>
	        <?php if($key%4==3) { ?>
	        </div>
	        <?php } ?>
        <?php endforeach; ?>
    </div>
</div>