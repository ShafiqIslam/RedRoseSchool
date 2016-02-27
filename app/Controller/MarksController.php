<?php
App::uses('AppController', 'Controller');
/**
 * Marks Controller
 *
 * @property Mark $Mark
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MarksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Mark->recursive = 0;
		$this->set('marks', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Mark->exists($id)) {
			throw new NotFoundException(__('Invalid mark'));
		}
		$options = array('conditions' => array('Mark.' . $this->Mark->primaryKey => $id));
		$this->set('mark', $this->Mark->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Mark->create();
			if ($this->Mark->save($this->request->data)) {
				$this->Session->setFlash(__('The mark has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mark could not be saved. Please, try again.'));
			}
		}
		$results = $this->Mark->Result->find('list');
		$subjects = $this->Mark->Subject->find('list');
		$this->set(compact('results', 'subjects'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Mark->exists($id)) {
			throw new NotFoundException(__('Invalid mark'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mark->save($this->request->data)) {
				$this->Session->setFlash(__('The mark has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mark could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Mark.' . $this->Mark->primaryKey => $id));
			$this->request->data = $this->Mark->find('first', $options);
		}
		$results = $this->Mark->Result->find('list');
		$subjects = $this->Mark->Subject->find('list');
		$this->set(compact('results', 'subjects'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Mark->id = $id;
		if (!$this->Mark->exists()) {
			throw new NotFoundException(__('Invalid mark'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Mark->delete()) {
			$this->Session->setFlash(__('The mark has been deleted.'));
		} else {
			$this->Session->setFlash(__('The mark could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
