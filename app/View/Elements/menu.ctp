<?php
	$controller = $this->params['controller'];
	$action = $this->params['action'];
	$action = substr($action, 6);
    if(isset($this->params['pass'][0]))
	   $method = $this->params['pass'][0];

	$academic_controllers = array('students', 'results', 'online_applications', 'onlineApplications', 'suggestions', 'syllabi');
	$accounting_controllers = array('accountings', 'categories');
	$administration_controllers = array('teachers', 'routines', 'classNames', 'subjects');
	$event_controllers = array('calendarEntries', 'notices', 'news');
	$settings_controllers = array('generals', 'links', 'sliderImages', 'photos');
?>

<div class="actions col-md-2 col-sm-2">
	<h5  id="menu"><span><i class="fa fa-home fa-2x"></i></span><?php echo $this->Html->link(__('Dashboard'), array('controller' => 'users' ,'action' => 'dashboard', 'admin' => true)); ?></h5>
	
	<ul class="nav-menu">
		<li class="node <?php if(in_array($controller, $academic_controllers) || ($controller=='users' && $action=='dashboard_academic')) echo 'selected';?>">
			<?php echo $this->Html->link(__('Academics'), array('controller' => 'users' ,'action' => 'dashboard_academic', 'admin' => true)); ?>
		</li>
		<?php
        if(in_array($controller, $academic_controllers) || ($controller=='users' && $action=='dashboard_academic')) {
        ?>
            <li class="add a-s <?php if($controller == 'students') echo 'selected';?>">
            	<?php echo $this->Html->link(__('Students'), array('controller' => 'students', 'action' => 'index')); ?>
            </li>
            <?php
            if($controller=='students') {
                ?>
                <li class="add_2 a-s <?php if($controller == 'students' && $action=='add') echo 'selected';?>">
                    <?php echo $this->Html->link(__('Add New Student'), array('controller' => 'students', 'action' => 'add')); ?>
                </li>
            <?php } ?>
            <li class="add a-s <?php if($controller == 'results') echo 'selected';?>">
            	<?php echo $this->Html->link(__('Results'), array('controller' => 'results', 'action' => 'index')); ?>
            </li>
            <li class="add a-s <?php if($controller == 'onlineApplications') echo 'selected';?>">
            	<?php echo $this->Html->link(__('Online Applications'), array('controller' => 'onlineApplications', 'action' => 'index', 'admin' => true)); ?>
            </li>
            <li class="add a-s <?php if($controller == 'syllabi') echo 'selected';?>">
                <?php echo $this->Html->link(__('Syllabus'), array('controller' => 'syllabi', 'action' => 'index', 'admin' => true)); ?>
            </li>
            <li class="add a-s <?php if($controller == 'suggestions') echo 'selected';?>">
                <?php echo $this->Html->link(__('Suggestions'), array('controller' => 'suggestions', 'action' => 'index')); ?>
            </li>
        <?php } ?>

		<li class="node <?php if(in_array($controller, $accounting_controllers) || ($controller=='users' && $action=='dashboard_accounting')) echo 'selected';?>">
			<?php echo $this->Html->link(__('Accountings'), array('controller' => 'users' ,'action' => 'dashboard_accounting', 'admin' => true)); ?>
		</li>
		<?php
        if(in_array($controller, $accounting_controllers) || ($controller=='users' && $action=='dashboard_accounting')) {
        ?>
            <li class="add a-s <?php if($controller == 'accountings' && $action == 'add') echo 'selected';?>">
                <?php echo $this->Html->link(__('Add'), array('controller' => 'accountings', 'action' => 'add')); ?>
            </li>
            <li class="add a-s <?php if($controller == 'accountings' && $action == 'index' && $method==0) echo 'selected';?>">
            	<?php echo $this->Html->link(__('Debits'), array('controller' => 'accountings', 'action' => 'index', 0)); ?>
            </li>
            <li class="add a-s <?php if($controller == 'accountings' && $action == 'index' && $method==1) echo 'selected';?>">
            	<?php echo $this->Html->link(__('Credits'), array('controller' => 'accountings', 'action' => 'index', 1)); ?>
            </li>
            <li class="add a-s <?php if($controller == 'categories') echo 'selected';?>">
            	<?php echo $this->Html->link(__('Manage Categories'), array('controller' => 'categories', 'action' => 'index', 'admin' => true)); ?>
            </li>
        <?php } ?>

        <li class="node <?php if(in_array($controller, $administration_controllers) || ($controller=='users' && $action=='dashboard_administration')) echo 'selected';?>">
        	<?php echo $this->Html->link(__('Administration'), array('controller' => 'users' ,'action' => 'dashboard_administration', 'admin' => true)); ?>
        </li>
		<?php
        if(in_array($controller, $administration_controllers) || ($controller=='users' && $action=='dashboard_administration')) {
            ?>
            <li class="add a-s <?php if($controller == 'teachers') echo 'selected';?>">
            	<?php echo $this->Html->link(__('Teachers'), array('controller' => 'teachers', 'action' => 'index')); ?>
            </li>
            <li class="add a-s <?php if($controller == 'routines') echo 'selected';?>">
            	<?php echo $this->Html->link(__('Routines'), array('controller' => 'routines', 'action' => 'index')); ?>
            </li>
            <li class="add a-s <?php if($controller == 'classNames') echo 'selected';?>">
            	<?php echo $this->Html->link(__('Classes'), array('controller' => 'classNames', 'action' => 'index', 'admin' => true)); ?>
            </li>
            <li class="add a-s <?php if($controller == 'subjects') echo 'selected';?>">
            	<?php echo $this->Html->link(__('Subjects'), array('controller' => 'subjects', 'action' => 'index', 'admin' => true)); ?>
            </li>
        <?php } ?>

        <li class="node <?php if($controller=='messages') echo 'selected';?>">
            <?php echo $this->Html->link(__('Messages'), array('controller' => 'messages' ,'action' => 'dashboard_msg', 'admin' => true)); ?>
        </li>
        <?php
        if($controller=='messages') {
        ?>
            <li class="add a-s <?php if($controller == 'messages' && $action='add') echo 'selected';?>">
                <?php echo $this->Html->link(__('Compose'), array('controller' => 'messages', 'action' => 'compose')); ?>
            </li>
        <?php } ?>

	    <li class="node <?php if(in_array($controller, $event_controllers) || ($controller=='users' && $action=='dashboard_event')) echo 'selected';?>">
			<?php echo $this->Html->link(__('Events'), array('controller' => 'users' ,'action' => 'dashboard_event', 'admin' => true)); ?>
		</li>
		<?php
        if(in_array($controller, $event_controllers) || ($controller=='users' && $action=='dashboard_event')) {
        ?>
            <li class="add a-s <?php if($controller == 'calendarEntries') echo 'selected';?>">
            	<?php echo $this->Html->link(__('Calendar Entries'), array('controller' => 'calendarEntries', 'action' => 'index')); ?>
            </li>
            <li class="add a-s <?php if($controller == 'notices') echo 'selected';?>">
            	<?php echo $this->Html->link(__('Notices'), array('controller' => 'notices', 'action' => 'index')); ?>
            </li>
            <li class="add a-s <?php if($controller == 'news') echo 'selected';?>">
            	<?php echo $this->Html->link(__('News'), array('controller' => 'news', 'action' => 'index', 'admin' => true)); ?>
            </li>
        <?php } ?>

        <li class="node <?php if(in_array($controller, $settings_controllers) || ($controller=='users' && ($action=='dashboard_settings' || $action=='add' || $action=='index' || $action=='edit'))) echo 'selected';?>">
        	<?php echo $this->Html->link(__('Settings'), array('controller' => 'users' ,'action' => 'dashboard_settings', 'admin' => true)); ?>
        </li>
		<?php
        if(in_array($controller, $settings_controllers) || ($controller=='users' && ($action=='dashboard_settings' || $action=='add' || $action=='index' || $action=='edit'))) {
            ?>
            <li class="add a-s <?php if($controller == 'generals') echo 'selected';?>">
            	<?php echo $this->Html->link(__('General'), array('controller' => 'generals', 'action' => 'edit')); ?>
            </li>
            <li class="add a-s <?php if($controller == 'links') echo 'selected';?>">
            	<?php echo $this->Html->link(__('Links'), array('controller' => 'links', 'action' => 'index')); ?>
            </li>
            <li class="add a-s <?php if($controller == 'photos' || $controller=='sliderImages') echo 'selected';?>">
            	<?php echo $this->Html->link(__('Gallery'), array('controller' => 'photos', 'action' => 'index', 'admin' => true)); ?>
            </li>
            <?php
            if(($controller=='photos' && ($action=='index' || $action=='edit' || $action=='add')) || $controller=='sliderImages') {
                ?>
                <li class="add_2 a-s <?php if($controller == 'photos' && $action=='add') echo 'selected';?>">
                    <?php echo $this->Html->link(__('Add New photo'), array('controller' => 'photos', 'action' => 'add')); ?>
                </li>
                <li class="add_2 a-s <?php if($controller == 'sliderImages') echo 'selected';?>">
                    <?php echo $this->Html->link(__('Slider'), array('controller' => 'sliderImages', 'action' => 'index')); ?>
                </li>
            <?php } ?>
            <li class="add a-s <?php if($controller == 'users' && $action!='dashboard_settings') echo 'selected';?>">
            	<?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?>
            </li>
            <?php
            if($controller=='users' && ($action=='index' || $action=='edit' || $action=='add')) {
                ?>
                <li class="add_2 a-s <?php if($controller == 'users' && $action=='add') echo 'selected';?>">
                    <?php echo $this->Html->link(__('Add New User'), array('controller' => 'users', 'action' => 'add')); ?>
                </li>
            <?php } ?>
        <?php } ?>
        <li class="logout"><a href="<?php echo $this->webroot;?>admin/users/logout"><i class="fa fa-sign-out fa-lg"></i>Logout</a>
        </li>
    </ul>
</div>