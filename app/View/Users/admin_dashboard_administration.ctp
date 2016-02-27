<?php echo $this->element('menu'); ?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <div class="row dashbrd">
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'teachers', 'action' => 'index')) ?>">
                    <div class="realtime t-color">
                        <span>Teachers</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-male fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $user; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'routines', 'action' => 'index')) ?>">
                    <div class="d-feedback t-color">
                        <span>Routines</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-newspaper-o fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $dogs; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'classNames', 'action' => 'index', 'admin' => true)) ?>">
                    <div class="d-feedback t-color">
                        <span>Classes</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-home fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $reports; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'subjects', 'action' => 'index', 'admin' => true, 'settings')) ?>">
                    <div class="realtime t-color">
                        <span>Subjects</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-book fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $cms_user; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>