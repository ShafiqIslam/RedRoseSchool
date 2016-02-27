<?php
App::uses('AppController', 'Controller');
/**
 * ClassNames Controller
 *
 * @property ClassName $ClassName
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ClassNamesController extends AppController {

	public $components = array('Paginator', 'Session');

	public function admin_index() {
		$this->ClassName->recursive = 0;
		$this->set('classNames', $this->Paginator->paginate());
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ClassName->create();
			if ($this->ClassName->save($this->request->data)) {
				$this->Session->setFlash(__('The class name has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The class name could not be saved. Please, try again.'));
			}
		}
		$teachers = $this->ClassName->Teacher->find('list');
		$this->set(compact('teachers'));
	}

	public function admin_edit($id = null) {
		if (!$this->ClassName->exists($id)) {
			throw new NotFoundException(__('Invalid class name'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->ClassName->id = $id;
			if ($this->ClassName->save($this->request->data)) {
				$this->Session->setFlash(__('The class name has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The class name could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ClassName.' . $this->ClassName->primaryKey => $id));
			$this->request->data = $this->ClassName->find('first', $options);
		}
		$teachers = $this->ClassName->Teacher->find('list');
		$this->set(compact('teachers'));
	}

	public function admin_delete($id = null) {
		$this->ClassName->id = $id;
		if (!$this->ClassName->exists()) {
			throw new NotFoundException(__('Invalid class name'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ClassName->delete()) {
			$this->Session->setFlash(__('The class name has been deleted.'));
		} else {
			$this->Session->setFlash(__('The class name could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
