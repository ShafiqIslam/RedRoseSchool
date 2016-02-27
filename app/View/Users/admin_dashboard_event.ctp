<?php echo $this->element('menu'); ?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <div class="row dashbrd">
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'calendarEntries', 'action' => 'index')) ?>">
                    <div class="realtime t-color">
                        <span>Calendar Entries</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-calendar fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $user; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'notices', 'action' => 'index')) ?>">
                    <div class="d-feedback t-color">
                        <span>Notices</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-flag-checkered fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $dogs; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'news', 'action' => 'index', 'admin' => true)) ?>">
                    <div class="d-feedback t-color">
                        <span>News</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-newspaper-o fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $reports; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>