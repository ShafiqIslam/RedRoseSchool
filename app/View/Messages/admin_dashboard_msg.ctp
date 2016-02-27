<?php echo $this->element('menu'); ?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <div class="row dashbrd">
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'compose', 'admin'=>true)) ?>">
                    <div class="realtime t-color">
                        <span>Compose</span>
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
                <a href="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'inbox', 'admin'=>true)) ?>">
                    <div class="d-feedback t-color">
                        <span>Incoming</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-external-link-square fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php if($not_read) echo $not_read;?></p>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'sent', 'admin' => true)) ?>">
                    <div class="d-feedback t-color">
                        <span>Sent Messages</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-file-image-o fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php if($not_sent) echo $not_sent;?></p>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="#">
                    <div class="realtime t-color">
                        <span>Balance</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-user fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php echo $balance;?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>