<script type="text/javascript">
    $(function () {
        $("#go2").on('click', function () {
            var from = $.trim($('#from').val());
            var to = $.trim($('#to').val());
            location.href = ROOT+ 'admin/users/dashboard_accounting/from:' + from + '/to:' + to;
        });
    });
</script>

<?php echo $this->element('menu'); ?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <div class="row dashbrd realtime t_top-color">
            <div class="col-md-12 col-sm-12">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-1 control-label">From</label>
                        <div class="col-sm-3">
                            <input type="date" id="from" class="form-control" value="<?php echo $from;?>">
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">To</label>
                        <div class="col-sm-3">
                            <input type="date" id="to" class="form-control" value="<?php echo $to;?>">
                        </div>
                        <div class="col-sm-1">
                            <?php
                            echo $this->Form->input('Go', array('id' => 'go2','class'=>'btn btn-info', 'type' => 'button', 'label' => false));
                            ?>
                        </div>
                    </div>
                    <div class="row accounting">
                        <div class="col-sm-offset-1">
                            <span class="credit_total">আয়ঃ <?php echo $credit;?></span>
                            <span class="col-sm-offset-2 debit_total">ব্যয়ঃ <?php echo $debit;?></span>
                            <span class="col-sm-offset-2 total">সর্বমোটঃ <?php echo $total;?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row dashbrd">
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'accountings', 'action' => 'add')) ?>">
                    <div class="realtime t-color">
                        <span>Add New</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-plus fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $user; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'accountings', 'action' => 'index', 0)) ?>">
                    <div class="realtime t-color">
                        <span>Debits</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-minus-square-o fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $user; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'accountings', 'action' => 'index', 1)) ?>">
                    <div class="d-feedback t-color">
                        <span>Credits</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-cc-mastercard fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $dogs; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'index', 'admin' => true)) ?>">
                    <div class="d-feedback t-color">
                        <span>Categories</span>
                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-list fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $reports; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>