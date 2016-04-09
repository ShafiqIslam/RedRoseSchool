<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>font-awesome/css/font-awesome.min.css">

    <title>রেড রোজ স্কুল</title>

    <?php
        echo $this->Html->meta('icon');
        //echo $this->Html->css('cake.generic');
        echo $this->Html->css(array('bootstrap', 'latest-notice', 'eventCalendar', 'eventCalendar_theme_responsive', 'superbox', 'style_public'));
        echo $this->Html->script(array('jquery-1.11.3', 'bootstrap.min', 'bootstrap-formhelpers-phone.js'));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
    <!--<script
     src="http://maps.googleapis.com/maps/api/js">
    </script>-->
</head>

<body>
  <!--========================= Header Bar============================-->
  <header id="header" class=" container-fluid header-top" >
    <div class="container">
      <div class="row">
        <div class="col-sm-2">
          <a href="<?php echo $this->webroot;?>"><img class="img-responsive logo" src="<?php echo $this->webroot;?>img/logo.jpg" alt="রেড রোজ স্কুল লোগো" /></a>
        </div>
        <div class="col-sm-10">
          <a href="<?php echo $this->webroot;?>"><h1>রেড রোজ নার্সারী স্কুল</h1></a>
        </div>
      </div>
    </div>    
  </header>
  <div style="clear:both"></div>

  <?php echo $this->element('public_nav');?>

  <?php echo $this->fetch('content'); ?>

  <!-- FOOTER -->
  <div style="clear:both"></div>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <h3>আমাদের কথা</h3>
          <hr>
          <ul id="footer_link_about">
            <li><a href="<?php echo $this->webroot;?>about#chairman"><span class="glyphicon glyphicon-menu-right">চেয়ারম্যানের কথা</a></li>
            <li><a href="<?php echo $this->webroot;?>about#headmaster"><span class="glyphicon glyphicon-menu-right">প্রধান শিক্ষকের কথা</a></li>
            <li><a href="<?php echo $this->webroot;?>about#mang-commitee"><span class="glyphicon glyphicon-menu-right">ব্যবস্থাপনা কমিটি</a></li>
            <li><a href="<?php echo $this->webroot;?>about#goal"><span class="glyphicon glyphicon-menu-right">লক্ষ্য ও উদ্দেশ্য</a></li>
          </ul>
        </div>
        <div class="col-sm-3">
          <h3>একাডেমিক</h3>
          <hr>
          <ul>
            <li><a href="<?php echo $this->webroot;?>guardian"><span class="glyphicon glyphicon-menu-right">অভিভাবকদের</a></li>
            <li><a href="<?php echo $this->webroot;?>dress"><span class="glyphicon glyphicon-menu-right">পোশাক কোড</a></li>
            <li><a href="<?php echo $this->webroot;?>syllabus"><span class="glyphicon glyphicon-menu-right">সিলেবাস</a></li>
            <li><a href="<?php echo $this->webroot;?>suggestion"><span class="glyphicon glyphicon-menu-right">সাজেশন</a></li>
            <li><a href="<?php echo $this->webroot;?>result"><span class="glyphicon glyphicon-menu-right">রেজাল্ট</a></li>
            <li><a href="<?php echo $this->webroot;?>routine"><span class="glyphicon glyphicon-menu-right">ক্লাস রুটিন</a></li>
          </ul>
        </div>
        <div class="col-sm-3">
          <h3>ফটোগ্যালারি</h3>
          <hr>
          <ul>
            <li><a href="<?php echo $this->webroot;?>gallery/0"><span class="glyphicon glyphicon-menu-right">বিদ্যালয়ের ছবি</a></li>
            <li><a href="<?php echo $this->webroot;?>gallery/1"><span class="glyphicon glyphicon-menu-right">পিকনিকের ছবি</a></li>
            <li><a href="<?php echo $this->webroot;?>gallery/2"><span class="glyphicon glyphicon-menu-right">স্পোর্টসের ছবি</a></li>
            <li><a href="<?php echo $this->webroot;?>gallery/3"><span class="glyphicon glyphicon-menu-right">ক্লাস পার্টির ছবি</a></li>
          </ul>
        </div>
        <div class="col-sm-3">
          <h3>অন্যান্য</h3>
          <hr>
          <ul>
            <li><a href="<?php echo $this->webroot;?>video"><span class="glyphicon glyphicon-menu-right">ভিডিও</a></li>
            <li><a href="<?php echo $this->webroot;?>game"><span class="glyphicon glyphicon-menu-right">গেম</a></li>
          </ul>
        </div>
      </div>
    </div>
    <hr>
    <p class="pull-left">রেড রোজ নার্সারী স্কুল কতৃক সংরক্ষিত</p>
    <p class="pull-right developer"><a href="#">Developed By XORCODER.COM</a></p>
  </footer>
  <?php echo $this->Html->script(array('jquery.eventCalendar', 'jquery.bootstrap.newsbox', 'jquery.superbox', 'custom')); ?>
</body>
</html>
