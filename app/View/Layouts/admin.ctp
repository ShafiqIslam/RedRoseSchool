<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo 'Red Rose School: ' . $title_for_layout; ?>
    </title>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot?>font-awesome/css/font-awesome.min.css">
    <?php
    echo $this->Html->meta('icon');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->Html->css(array('bootstrap.min.admin', 'bootstrap-theme_2', 'style_admin', 'redactor'));
    echo $this->Html->script(array('jquery-1.8.2.min'));

    echo $this->fetch('script');
    ?>
    <script>
        var ROOT = '<?php echo $this->Html->url('/', true); ?>';
        var HERE = '<?php echo $this->here; ?>';
    </script>
</head>
<body>
<div class="container-fluid">
    <div id="row">
        <div id="header" class="noprint">
            <div id="logo-left" class="">
                <a href="<?php echo $this->Html-> url('/')?>"><?php echo $this->Html->image('logo.jpg', array('alt' => 'logo')); ?></a>
            </div>

        </div>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </div>

</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
