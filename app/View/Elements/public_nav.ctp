<!--================== NAVBAR ================================ -->
<div class="navbar-wrapper">
  <div class="container">
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?php if($page=='home') echo 'active';?>"><a href="<?php echo $this->webroot;?>home">হোম</a></li>
            <li class="dropdown <?php if($page=='about') echo 'active';?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">আমাদের কথা <span class="caret"></span></a>
              <ul class="dropdown-menu" id="main_link_about">
                <li><a href="<?php echo $this->webroot;?>about#chairman">চেয়ারম্যানের কথা</a></li>
                <li><a href="<?php echo $this->webroot;?>about#headmaster">প্রধান শিক্ষকের কথা</a></li>
                <li><a href="<?php echo $this->webroot;?>about#mang-commitee">ব্যবস্থাপনা কমিটি</a></li>
                <li><a href="<?php echo $this->webroot;?>about#goal">লক্ষ্য ও উদ্দেশ্য</a></li>
              </ul>
            </li>
            <li class="dropdown <?php if($page=='academic') echo 'active';?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">একাডেমিক<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $this->webroot;?>guardian">অভিভাবকদের</a></li>
                <li><a href="<?php echo $this->webroot;?>dress">পোশাক কোড</a></li>
                <li><a href="<?php echo $this->webroot;?>book_list">পাঠ্যতালিকা </a></li>
                <li><a href="<?php echo $this->webroot;?>syllabus">সিলেবাস</a></li>
                <li><a href="<?php echo $this->webroot;?>suggestion">সাজেশন</a></li>
              </ul>
            </li>
            <li class="<?php if($page=='result') echo 'active';?>"><a href="<?php echo $this->webroot;?>result">রেজাল্ট</a></li>
            <li class="dropdown <?php if($page=='gallery') echo 'active';?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ফটোগ্যালারি <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $this->webroot;?>gallery/0">বিদ্যালয়ের ছবি</a></li>
                <li><a href="<?php echo $this->webroot;?>gallery/1">পিকনিকের ছবি</a></li>
                <li><a href="<?php echo $this->webroot;?>gallery/2">স্পোর্টসের ছবি</a></li>
                <li><a href="<?php echo $this->webroot;?>gallery/3">ক্লাস পার্টির ছবি</a></li>
              </ul>
            </li>
            <li class="<?php if($page=='contact') echo 'active';?>"><a href="<?php echo $this->webroot;?>contact">যোগাযোগ</a></li>
            <li class="<?php if($page=='routine') echo 'active';?>"><a href="<?php echo $this->webroot;?>routine">ক্লাস রূটিন</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">অন্যান্য <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $this->webroot;?>video">ভিডিও</a></li>
                <li><a href="<?php echo $this->webroot;?>game">গেম</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div><!--End of nav bar-->

<div class="container">
  <div class="latest-news">
    <table>
      <tr>
        <td><span class="news-head"><button>সর্বশেষ</button></span></td>
        <td class="news-text-row">
          <div class="news_latest">
            <ul>
              <?php foreach($latest_news as $item) { ?>
              <li><a href="<?php echo $this->webroot.'news/'.$item['News']['id'];?>"><?php echo $item['News']['title'];?></a></li>
              <?php } ?>
            </ul>
          </div>
        </td>
      </tr>
    </table>
  </div>
</div>