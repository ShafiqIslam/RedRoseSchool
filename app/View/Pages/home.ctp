<div class="container main-content">
    <div class="row">
      <!--==============LEFT SIDE COLUMN=============-->
      <div class="col-sm-9">
        
        <!--=================slider =================-->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
          <?php foreach ($sliderImages as $key=>$item) { ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $key;?>" class="<?php if($key==0) echo 'active';?>"></li>
          <?php } ?>
          </ol>
          <div class="carousel-inner" role="listbox">
          <?php foreach ($sliderImages as $key=>$item) { ?>
            <div class="item <?php if($key==0) echo 'active';?>">
              <img class="first-slide" src="<?php echo $this->webroot.'files/upload_photos/'.$item['Photo']['image']; ?>" alt="First slide">
              <div class="container">
                <div class="carousel-caption">
                  <p><?php echo $item['Photo']['caption']; ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div><!-- Carousel ending-->

        <!--==============Admission Section============-->
        <?php if($general_data['General']['online_admission_on']) { ?>
        <div>
          <div class="admission">
            <h1>অনলাইন ভর্তি প্রক্রিয়া </h1>
            <hr class="admission-h1-border">
              <p><?php echo $general_data['General']['admission_msg']; ?></p>
            <div class="button online_apply">
              <!--<button class="btn">অনলাইন আবেদন করার পদ্ধতি</button>-->
              <a href="<?php $this->webroot;?>files/application_instr/postal_result.pdf" id="" class="btn" target="_blank">অনলাইন আবেদন করার পদ্ধতি</a>
              <a href="online_application" id="btn_online" class="btn btn_online">অনলাইন আবেদন</a>
              <a href="application_status" class="btn btn_online appli_status">আপনার অ্যাপ্লিকেশন চেক করুন</a>
            </div>

            <div class="appli_status"></div>
          </div>
        </div><!--Admission Ending-->
        <?php } ?>

        <!--==============About School===============-->
        <div>
          <div class="about-schhol">
            <h1>রেড রোজ নার্সারী স্কুল</h1>
            <hr class="about-schhol-border">
            <p><?php echo $general_data['General']['about']; ?></p>
          </div>
        </div><!--about school ending-->

      </div>

      <!--==============RIGHT SIDE COLUMN==============-->

      <div class="col-offset-1 col-sm-3">
        <!--==========Calendar=============-->
        <!-- date time commented on eventCalendar.js:366 -->
        <div class="calendar">
          <!-- Responsive calendar - START -->
          <div id="eventCalendarInline"></div>
          <script type="text/javascript">
          var calendar_events = <?php echo json_encode($calendar_data)?>
          </script>
          <script>
            $(document).ready(function() {
              /*var eventsInline = [
                { "date": "2016-02-25 00:00:00", "title": "Project A meeting", "description": "Lorem Ipsum dolor set" },
                { "date": "2016-02-21 00:00:00", "title": "Project B demo", "description": "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua" }
              ];*/

              //console.log(calendar_events);

              $("#eventCalendarInline").eventCalendar({
                jsonData: calendar_events
              });
            });
          </script>
        </div>
        
        <!--==================== Larest News=================-->
        <div class="latest-notice">
          <div class="notice-body">
            <div class="panel">
              <div class="panel-heading"><h3>সর্বশেষ বিজ্ঞপ্তি</h3></div>
              <div class="panel-body">
                <ul class="demo1">
                  <?php foreach($notices as $notice) { ?>
                  <li class="news-item">
                    <table cellpadding="3">
                      <tr>
                        <td><a href="notice/<?php echo $notice['Notice']['id'];?>"><?php echo date_format(date_create($notice['Notice']['created']), 'd M Y');?> - <?php echo $notice['Notice']['title']?>...</a></td>
                      </tr>
                    </table>
                  </li>
                  <?php } ?>
                </ul>
                <div class="panel-footer"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- here is a slider of latest news which are slide upper-->
        
        <!--=================Necessary Links ===============-->
        <div class="links">
          <div class="list-group">
            <h3 class="list-group-item list-group-item-success">প্রয়োজনীয় লিংক সমূহ</h3>
            <ul class="list-group list-group-body">
              <?php foreach($links as $link) { ?>
              <li class="list-group-item"><a href="<?php echo $link['Link']['link']?>" target="_blank"><span class="glyphicon glyphicon-menu-right"></span><?php echo $link['Link']['name']?></a></li>
              <?php } ?>
            </ul>
          </div>
        </div><!--End of Some Links-->

      </div>  
    </div>  
</div>