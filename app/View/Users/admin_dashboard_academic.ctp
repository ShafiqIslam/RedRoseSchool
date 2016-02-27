<?php echo $this->element('menu'); ?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <div class="row dashbrd">
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'index')) ?>">
                    <div class="realtime t-color">
                        <span>Students</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-child fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $user; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'results', 'action' => 'index')) ?>">
                    <div class="d-feedback t-color">
                        <span>Results</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-signal fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $dogs; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'onlineApplications', 'action' => 'index', 'admin' => true)) ?>">
                    <div class="d-feedback t-color">
                        <span>Online Applications</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-book fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $reports; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'syllabi', 'action' => 'index')) ?>">
                    <div class="realtime t-color">
                        <span>Syllabus</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-sticky-note fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $user; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'suggestions', 'action' => 'index')) ?>">
                    <div class="realtime t-color">
                        <span>Suggestion</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-medkit fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $user; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>