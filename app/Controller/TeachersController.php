<?php
App::uses('AppController', 'Controller');

class TeachersController extends AppController {

	public $components = array('Paginator', 'Session');

	public function admin_index() {
		$conditions = array();
        $keyword = null;
		if(!empty($this->request->params['named']['keyword'])) {
			$keyword = $this->request->params['named']['keyword'];
			if (!empty($keyword)) {
	        	$conditions = am($conditions, array(
	                    'OR' =>array(
	                        'Teacher.title LIKE' => '%' . $keyword . '%',
	                        'Teacher.designation LIKE' => '%' . $keyword . '%',
	                        'Teacher.subject LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}
               
        $this->Teacher->recursive = 0;
        $this->paginate = array('all',
            'limit' => 10,
            'conditions' => $conditions,
        );

		$this->set('teachers', $this->Paginator->paginate());
		$this->set('keyword', $keyword);
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			if (!empty($this->request->data['Teacher']['photo']['name'])) {
                $file_name = $this->_upload($this->request->data['Teacher']['photo'], 'teachers_photos');
                $this->request->data['Teacher']['photo'] = $file_name;
            } else {
                unset($this->request->data['Teacher']['photo']);
            }
			$this->Teacher->create();
			if ($this->Teacher->save($this->request->data)) {
				$this->Session->setFlash(__('The teacher has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		if (!$this->Teacher->exists($id)) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (!empty($this->request->data['Teacher']['photo'])) {
                if (!empty($this->request->data['Teacher']['photo']['name'])) {
	                $file_name = $this->_upload($this->request->data['Teacher']['photo'], 'teachers_photos');
	                $this->request->data['Teacher']['photo'] = $file_name;
	            } else {
                    $options = array('conditions' => array('Teacher.' . $this->Teacher->primaryKey => $id));
                    $data = $this->Teacher->find('first', $options);
                    $this->request->data['Teacher']['photo'] = $data['Teacher']['photo'];
                }
            } else {
                unset($this->request->data['Teacher']['photo']);
            }
            $this->Teacher->id = $id;
			if ($this->Teacher->save($this->request->data)) {
				$this->Session->setFlash(__('The teacher has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Teacher.' . $this->Teacher->primaryKey => $id));
			$this->request->data = $this->Teacher->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
		$this->Teacher->id = $id;
		if (!$this->Teacher->exists()) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Teacher->delete()) {
			$this->Session->setFlash(__('The teacher has been deleted.'));
		} else {
			$this->Session->setFlash(__('The teacher could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
