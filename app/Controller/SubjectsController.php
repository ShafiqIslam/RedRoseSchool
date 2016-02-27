<?php
App::uses('AppController', 'Controller');

class SubjectsController extends AppController {

	public $components = array('Paginator', 'Session');

	public function admin_index() {
		$classNames = $this->Subject->ClassName->find('all');
		$class_name_id = null;
		$this->set(compact('classNames', 'class_name_id'));
	}

	public function admin_list($class_name_id=null) {
		if (!$this->Subject->ClassName->exists($class_name_id)) {
			throw new NotFoundException(__('Invalid class'));
		}
		$this->Subject->recursive = 0;
		$subjects = $this->Subject->find('all', array(
				'conditions' => array('Subject.class_name_id' => $class_name_id),
				'order' => 'Subject.order'
			)
		);
		$this->Subject->ClassName->recursive = -1;
		$classNames = $this->Subject->ClassName->find('all');
		$class_name = "";
		foreach ($classNames as $key => $className) {
			if($className['ClassName']['id']==$class_name_id) {
				$class_name = $className['ClassName']['name'];
				break;
			}
		}
		$this->set(compact('subjects', 'classNames', 'class_name', 'class_name_id'));
	}

	public function admin_add($class_name_id=null) {
		if (!$this->Subject->ClassName->exists($class_name_id)) {
			throw new NotFoundException(__('Invalid class'));
		}

		if ($this->request->is('post')) {
			$this->request->data['Subject']['class_name_id'] = $class_name_id;
			$orders = $this->Subject->find('all', array(
				"fields" => array('MAX(Subject.order) as max_order')
			));
			$this->request->data['Subject']['order'] = $orders[0][0]['max_order'] + 1;
			$this->Subject->create();
			if ($this->Subject->save($this->request->data)) {
				$this->Session->setFlash(__('The subject has been saved.'));
			} else {
				$this->Session->setFlash(__('The subject could not be saved. Please, try again.'));
			}
			return $this->redirect(array('action' => 'list', $class_name_id));
		}
		
		$this->Subject->ClassName->recursive = -1;
		$className = $this->Subject->ClassName->find('first', array(
				'conditions' => array('ClassName.id'=>$class_name_id)
			)
		);
		$class_name = $className['ClassName']['name'];
		$this->set(compact('class_name_id','class_name'));
	}

	public function admin_edit($class_name_id=null, $edit_id=null) {
		if (!$this->Subject->ClassName->exists($class_name_id)) {
			throw new NotFoundException(__('Invalid class'));
		}

		if (!$this->Subject->exists($edit_id)) {
			throw new NotFoundException(__('Invalid subject'));
		}

		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Subject']['class_name_id'] = $class_name_id;
			$this->Subject->id = $edit_id;
			if ($this->Subject->save($this->request->data)) {
				$this->Session->setFlash(__('The subject has been saved.'));
			} else {
				$this->Session->setFlash(__('The subject could not be saved. Please, try again.'));
			}
			return $this->redirect(array('action' => 'list', $class_name_id));
		}
		$this->Subject->recursive = 0;
		$subjects = $this->Subject->find('all', array(
				'conditions' => array('Subject.class_name_id' => $class_name_id),
				'order' => 'Subject.order'
			)
		);
		$this->Subject->ClassName->recursive = -1;
		$classNames = $this->Subject->ClassName->find('all');
		$class_name = "";
		foreach ($classNames as $key => $className) {
			if($className['ClassName']['id']==$class_name_id) {
				$class_name = $className['ClassName']['name'];
				break;
			}
		}
		$this->set(compact('subjects', 'classNames', 'class_name', 'class_name_id', 'edit_id'));
	}

	public function admin_delete($class_name_id=null, $id = null) {
		if (!$this->Subject->ClassName->exists($class_name_id)) {
			throw new NotFoundException(__('Invalid class'));
		}

		$this->Subject->id = $id;
		if (!$this->Subject->exists()) {
			throw new NotFoundException(__('Invalid subject'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Subject->delete()) {
			$this->Session->setFlash(__('The subject has been deleted.'));
		} else {
			$this->Session->setFlash(__('The subject could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'list', $class_name_id));
	}
}
