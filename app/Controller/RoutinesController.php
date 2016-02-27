<?php
App::uses('AppController', 'Controller');

class RoutinesController extends AppController {

	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('public_display');
    }

	public function admin_index() {
		$classNames = $this->Routine->ClassName->find('all');
		$class_name_id = null;
		$this->set(compact('classNames', 'class_name_id'));
	}

	public function admin_list($class_name_id=null, $show_day=null) {
		if (!$this->Routine->ClassName->exists($class_name_id)) {
			throw new NotFoundException(__('Invalid class'));
		}
		$this->Routine->recursive = 0;
		$routines = $this->Routine->find('all', array(
				'conditions' => array('Routine.class_name_id' => $class_name_id),
				'order' => 'Routine.period'
			)
		);
		$routines_all = $routines;
		//AuthComponent::_setTrace($routines);

		$week_days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday');
		if(empty($show_day)) {
			$show_day = date('l');
			if($show_day=="Friday" || $show_day=="Saturday") {
				$show_day = "Sunday";
			}
		}

		foreach ($week_days as $day) {
			$daily_routine[$day] = array();
		}
		foreach ($routines as $item) {
			$day = $week_days[$item['Routine']['weekday']];
			array_push($daily_routine[$day], $item);
		}
		//AuthComponent::_setTrace($daily_routine);

		$this->Routine->ClassName->recursive = -1;
		$classNames = $this->Routine->ClassName->find('all');
		$class_name = "";
		foreach ($classNames as $key => $className) {
			if($className['ClassName']['id']==$class_name_id) {
				$class_name = $className['ClassName']['name'];
				break;
			}
		}
		$statuses = array('In Time', 'Delayed', 'Postponed');
		$this->set(compact('statuses', 'routines_all', 'classNames', 'class_name', 'class_name_id', 'daily_routine', 'week_days', 'show_day'));
	}

	public function admin_routine($class_name_id=null) {
		
	}

	public function admin_add($class_name_id=null) {
		if (!$this->Routine->ClassName->exists($class_name_id)) {
			throw new NotFoundException(__('Invalid class'));
		}

		$week_days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday');

		if ($this->request->is('post')) {
			$this->request->data['Routine']['weekday'] = $this->request->data['Routine']['weekday'];
			$this->Routine->create();
			if ($this->Routine->save($this->request->data)) {
				$this->Session->setFlash(__('The routine has been saved.'));
			} else {
				$this->Session->setFlash(__('The routine could not be saved. Please, try again.'));
			}
			$show_day = $week_days[$this->request->data['Routine']['weekday']];
			return $this->redirect(array('action' => 'list', $class_name_id, $show_day));
		}

		$this->Routine->ClassName->recursive = -1;
		$classNames = $this->Routine->ClassName->find('all');
		$class_name = "";
		foreach ($classNames as $key => $className) {
			if($className['ClassName']['id']==$class_name_id) {
				$class_name = $className['ClassName']['name'];
				break;
			}
		}

		$subjects = $this->Routine->Subject->find('list', array(
				'conditions' => array('Subject.class_name_id' => $class_name_id)
			)
		);
		$teachers = $this->Routine->Teacher->find('list');
		$this->set(compact('subjects', 'teachers', 'class_name', 'class_name_id', 'week_days'));
	}

	public function admin_edit($class_name_id=null, $show_day=null, $id = null) {
		if (!$this->Routine->ClassName->exists($class_name_id)) {
			throw new NotFoundException(__('Invalid class'));
		}

		if (!$this->Routine->exists($id)) {
			throw new NotFoundException(__('Invalid routine'));
		}

		if ($this->request->is(array('post', 'put'))) {
			$this->Routine->id = $id;
			if ($this->Routine->save($this->request->data)) {
				$this->Session->setFlash(__('The routine has been saved.'));
			} else {
				$this->Session->setFlash(__('The routine could not be saved. Please, try again.'));
			}
			return $this->redirect(array('action' => 'list', $class_name_id, $show_day));
		}

		$this->Routine->recursive = 0;
		$routines = $this->Routine->find('all', array(
				'conditions' => array('Routine.class_name_id' => $class_name_id),
				'order' => 'Routine.period'
			)
		);
		$routines_all = $routines;
		//AuthComponent::_setTrace($routines);

		$week_days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday');

		foreach ($week_days as $day) {
			$daily_routine[$day] = array();
		}
		foreach ($routines as $item) {
			$day = $week_days[$item['Routine']['weekday']];
			array_push($daily_routine[$day], $item);
		}
		//AuthComponent::_setTrace($daily_routine);

		$this->Routine->ClassName->recursive = -1;
		$classNames = $this->Routine->ClassName->find('all');
		$class_name = "";
		foreach ($classNames as $key => $className) {
			if($className['ClassName']['id']==$class_name_id) {
				$class_name = $className['ClassName']['name'];
				break;
			}
		}

		$this->set(compact('id', 'routines_all', 'classNames', 'class_name', 'class_name_id', 'daily_routine', 'week_days', 'show_day'));

		#$classNames = $this->Routine->ClassName->find('list');
		$subjects = $this->Routine->Subject->find('list', array(
				'conditions' => array('Subject.class_name_id' => $class_name_id)
			)
		);
		$teachers = $this->Routine->Teacher->find('list');
		$statuses = array('In Time', 'Delayed', 'Postponed');
		$this->set(compact('subjects', 'teachers', 'statuses'));
	}

	public function admin_delete($class_name_id=null, $id = null, $show_day=null) {
		$this->Routine->id = $id;
		if (!$this->Routine->exists()) {
			throw new NotFoundException(__('Invalid routine'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Routine->delete()) {
			$this->Session->setFlash(__('The routine has been deleted.'));
		} else {
			$this->Session->setFlash(__('The routine could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'list', $class_name_id, $show_day));
	}

	public function public_display() {

		$this->Routine->ClassName->recursive = -1;
		$classNames = $this->Routine->ClassName->find('all');
		#AuthComponent::_setTrace($classNames);

		$week_days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday');

		$this->Routine->recursive = 0;
		$routines = $this->Routine->find('all');

		// dynamically creating routine for week days per class
		foreach ($routines as $key => $item) {
			$c = $item['Routine']['class_name_id'];
			$w = $week_days[$item['Routine']['weekday']];
			$p = $item['Routine']['period'];
			$routine[$c][$w][$p] = array(
				'subject' => $item['Subject']['name'], 
				'teacher' => $item['Teacher']['name']
			);
		}
		#AuthComponent::_setTrace($routine);

		$page = $subpage = $title_for_layout = "routine";
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		$this->loadModel('News');
		$this->News->recursive = 0;
		$latest_news = $this->News->find('all', array(
			'order' => 'News.created DESC',
			'limit' => 5
		));
		$this->set(compact('latest_news'));

		$this->set(compact('classNames', 'routine'));
		$this->layout = 'public';
		$this->render('../Pages/routine');
	}
}
