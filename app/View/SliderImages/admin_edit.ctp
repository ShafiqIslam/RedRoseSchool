<?php echo $this->element('menu');?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <h2><?php echo __('Slider Ordering'); ?></h2>
        <?php echo $this->Form->create('SliderImages'); ?>
        <table cellpadding="0" cellspacing="0" class="table">
            <tr>
                <th>Image</th>
                <th>Order</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($sliderImages as $sliderImage): ?>
                <tr>
                    <td><a class="image-link" style="width:50px;height:50px;" href="<?php echo $this->webroot.'files/upload_photos/'.$sliderImage['Photo']['image']?>">
		        		<?php echo $this->Html->image('../files/upload_photos/'.$sliderImage['Photo']['image'], array('height'=>'100px','width'=>'200px'));?>
		        	</a></td>
                    <td>
                    	<input class="slider_order" name="image_<?php echo $sliderImage['SliderImage']['id'];?>" type="text" value="<?php echo $sliderImage['SliderImage']['order'];?>">&nbsp;
                    </td>
                    <td class="actions" style="white-space: nowrap;">
                        <?php echo $this->Form->postLink(__('Remove'), array('action' => 'delete', $sliderImage['SliderImage']['id']), array('class' => 'btn btn-info'), __('Are you sure you want to remove %s?', $sliderImage['Photo']['caption']));  ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label"></label>
            <div class="col-sm-9">
                <button type="submit" class="btn submit-green s-c">Save</button>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>