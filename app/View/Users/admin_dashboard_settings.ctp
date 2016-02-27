<?php echo $this->element('menu'); ?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <div class="row dashbrd">
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'generals', 'action' => 'edit', 'admin'=>true)) ?>">
                    <div class="realtime t-color">
                        <span>General</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-th fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $user; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'links', 'action' => 'index', 'admin'=>true)) ?>">
                    <div class="d-feedback t-color">
                        <span>Links</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-external-link-square fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $dogs; ?></p>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'photos', 'action' => 'index', 'admin' => true)) ?>">
                    <div class="d-feedback t-color">
                        <span>Gallery</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-file-image-o fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $reports; ?></p>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index', 'admin' => true)) ?>">
                    <div class="realtime t-color">
                        <span>Users</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-user fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $cms_user; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>