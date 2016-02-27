<?php 
echo $this->Html->css(array('magnific-popup'));
echo $this->Html->script(array('jquery-1.9.1', 'jquery.magnific-popup'));
?>

<script type="text/javascript">
    $(function () {
        $("#go").on('click', function () {
            var keyword = $.trim($('#keyword').val());
            location.href = ROOT+ 'admin/photos/index/keyword:' + keyword;
        });
    });

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
        <div class="paging pull-right">
            <ul class="pagination pull-right">
                <?php
                $this->Paginator->options(array(
                    'url' => array(
                        'keyword' => $keyword
                    )
                ));
                echo $this->Paginator->prev(' < ', array('tag' => 'li', 'disabledTag' => 'li', 'escape' => false), '<a href="#"> < </a>', array('class' => 'prev disabled', 'tag' => 'li', 'disabledTag' => 'li', 'escape' => false));
                echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a'));
                echo $this->Paginator->next(' > ', array('tag' => 'li', 'disabledTag' => 'li', 'escape' => false), '<a href="#"> > </a>', array('class' => 'next disabled', 'tag' => 'li', 'disabledTag' => 'li', 'escape' => false));
                ?>
            </ul>
            <p class="text-right">
                <?php
                echo $this->Paginator->counter(array(
                    'format' => __('Showing {:start} to {:end} of {:count} entries')
                ));
                ?>
            </p>
        </div>

        <h2>
            <?php echo __('Photos'); ?>
            <?php echo $this->Html->link(__('Add New Photo'), array('action' => 'add'), array( 'class' => 'btn btn-success', 'style' => 'margin-left:30px')); ?>
        </h2>

        <div class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-1 control-label">Keyword</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('titlex', array('id' => 'keyword', 'label' => false,'class'=>'form-control')); ?>
                </div>
                <div class="col-sm-1">
                    <?php
                    echo $this->Form->input('Go', array('id' => 'go','class'=>'btn btn-info', 'type' => 'button', 'label' => false));
                    ?>
                </div>
            </div>
        </div>
        <?php foreach ($photos as $key=>$photo): ?>
        	<?php if($key%4==0) { ?>
	        <div class="row">
	        <?php } ?>
	        	<div class="col-md-3">
		        	<a class="image-link" href="<?php echo $this->webroot.'files/upload_photos/'.$photo['Photo']['image']?>">
		        		<?php echo $this->Html->image('../files/upload_photos/'.$photo['Photo']['image'], array('height'=>'150px','width'=>'250px'));?>
		        	</a>
		        	<div class="img_desc">
		        		<?php echo date_format(date_create($photo['Photo']['created']), 'd M Y'); ?>&nbsp;
			        	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $photo['Photo']['id']), array('class' => 'btn btn-info')); ?>
	                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $photo['Photo']['id']), array('class' => 'btn btn-info'), __('Are you sure you want to delete %s?', $photo['Photo']['caption']));  ?>
		        	</div>	        	
		        </div>
	        <?php if($key%4==3) { ?>
	        </div>
	        <?php } ?>
        <?php endforeach; ?>
    </div>
</div>