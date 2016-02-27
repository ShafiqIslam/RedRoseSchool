<?php
App::uses('AppController', 'Controller');

class CalendarEntriesController extends AppController {

	public $components = array('Paginator', 'Session');

	public function admin_index() {
		$conditions = array();
        $keyword = null;
		if(!empty($this->request->params['named']['keyword'])) {
			$keyword = $this->request->params['named']['keyword'];
			if (!empty($keyword)) {
	        	$conditions = am($conditions, array(
	                    'OR' =>array(
	                        'CalendarEntry.date LIKE' => '%' . $keyword . '%',
	                        'CalendarEntry.title LIKE' => '%' . $keyword . '%',
	                        'CalendarEntry.entry LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}

		$this->CalendarEntry->recursive = 0;
        $this->paginate = array('all',
            'limit' => 20,
            'conditions' => $conditions,
            'order' => array('CalendarEntry.date' => 'DESC'),
        );

		$this->set('calendarEntries', $this->Paginator->paginate());
		$this->set('keyword', $keyword);
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CalendarEntry->create();
			if ($this->CalendarEntry->save($this->request->data)) {
				$this->Session->setFlash(__('The calendar entry has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar entry could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		if (!$this->CalendarEntry->exists($id)) {
			throw new NotFoundException(__('Invalid calendar entry'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->CalendarEntry->id = $id;
			if ($this->CalendarEntry->save($this->request->data)) {
				$this->Session->setFlash(__('The calendar entry has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar entry could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CalendarEntry.' . $this->CalendarEntry->primaryKey => $id));
			$this->request->data = $this->CalendarEntry->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
		$this->CalendarEntry->id = $id;
		if (!$this->CalendarEntry->exists()) {
			throw new NotFoundException(__('Invalid calendar entry'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CalendarEntry->delete()) {
			$this->Session->setFlash(__('The calendar entry has been deleted.'));
		} else {
			$this->Session->setFlash(__('The calendar entry could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
