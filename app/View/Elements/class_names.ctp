<div class="class-name">
    <?php foreach ($classNames as $key => $className) { ?>
        <?php
            if($class_name_id == $className['ClassName']['id']) 
                $btn = 'btn btn-custom btn-danger';
            else
                $btn = 'btn btn-custom btn-info';
        ?>
        <?php echo $this->Html->link($className['ClassName']['name'], array('action' => 'list', $className['ClassName']['id']), array( 'class' => $btn)); ?>
    <?php } ?>
</div>