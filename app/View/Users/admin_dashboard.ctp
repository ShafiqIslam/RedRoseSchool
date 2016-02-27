<?php echo $this->element('menu'); ?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <div class="row dashbrd">
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard_academic', 'admin'=>true)) ?>">
                    <div class="realtime t-color">
                        <!-- <div class="staff t-color"> -->
                        <span>Academic</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-graduation-cap fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $user; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard_administration', 'admin'=>true)) ?>">
                    <div class="d-feedback t-color">
                        <!-- <div class="realtime t-color"> -->
                        <span>Administrative</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-user fa-5x"></i></i></span>
                            </div>
                            <p class="count-num"><?php //echo $dogs; ?></p>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'dashboard_msg', 'admin' => true)) ?>">
                    <div class="d-feedback t-color">
                        <!-- <div class="realtime t-color"> -->
                        <span>Messaging</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-envelope-o fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $reports; ?></p>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard_event', 'admin'=>true)) ?>">
                    <div class="d-feedback t-color">
                        <!-- <div class="realtime t-color"> -->
                        <span>Events</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-calendar fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $reports; ?></p>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard_accounting', 'admin'=>true)) ?>">
                    <div class="d-feedback t-color">
                        <!-- <div class="realtime t-color"> -->
                        <span>Accountings</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-calculator fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $reports; ?></p>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard_settings', 'admin' => true)) ?>">
                    <div class="realtime t-color">
                        <span>Settings</span>

                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-cog fa-5x"></i></i></span>
                            </div>
                            <p class="count-num"><?php //echo $cms_user; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>