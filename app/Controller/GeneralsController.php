<?php
App::uses('AppController', 'Controller');

class GeneralsController extends AppController {

	public $components = array('Paginator', 'Session');

	public function admin_edit() {
		$data = $this->General->find('first');
		if(empty($data)) {
			throw new NotFoundException(__('Invalid general'));
		}
		$id = $data['General']['id'];

		if ($this->request->is(array('post', 'put'))) {
			$this->General->id = $id;
			if ($this->General->save($this->request->data)) {
				$this->Session->setFlash(__('The general settings has been saved.'));
				return $this->redirect(array('action' => 'edit'));
			} else {
				$this->Session->setFlash(__('The general settings could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $data;
		}
	}
}
