<div class="container dashboard">
    <div class="row"  id="admin-login">
        <div class="col-md-5 col-sm-5 col-md-push-6 col-sm-push-6  ">
            <?php echo $this->Form->create('User',array('class'=>'form-group'));?>
            <fieldset>
                <h2>Red Rose School <span>Dashboard</span></h2>
                <?php
                echo $this->Form->input('username',array('class'=>'form-control','label'=>false,'placeholder'=>'UserName','div'=>array('class'=>'form-group')));
                echo $this->Form->input('password',array('class'=>'form-control','label'=>false,'placeholder'=>'Password', 'div'=>array('class'=>'form-group')));
                ?>                
                <button type="submit" class="btn btn-primary pull-right">LOGIN</button>
            </fieldset>            
            <?php echo $this->Form->end(); ?>
        </div>

        <div class="col-md-1 col-sm-1">
            <div class="border"></div>
        </div>
        <div class="col-md-5 col-sm-5 col-md-pull-7 col-sm-pull-7">
            <div class="admin-images pull-right">
                <?php echo $this->Html->image('logo.jpg', array('alt' => 'logo')); ?>
            </div>
        </div>
    </div>
</div>